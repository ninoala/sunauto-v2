document.addEventListener('DOMContentLoaded', () => {
    // =====================================================
    // Navigation
    // =====================================================

    const navToggle =
        document.querySelector('.nav-toggle');

    const navigation =
        document.querySelector('.primary-navigation');

    if (navToggle && navigation) {
        navToggle.addEventListener('click', () => {
            const isOpen =
                navToggle.getAttribute('aria-expanded') === 'true';

            navToggle.setAttribute(
                'aria-expanded',
                String(!isOpen)
            );

            navigation.classList.toggle('is-open');
        });
    }


    // =====================================================
    // Contact Form
    // =====================================================

    const contactForm =
        document.querySelector('.contact-form');

    if (contactForm) {
        const requiredFields =
            contactForm.querySelectorAll(
                'input[required], textarea[required]'
            );

        requiredFields.forEach((field) => {
            field.addEventListener('invalid', () => {
                field.setCustomValidity('');

                if (field.validity.valueMissing) {
                    field.setCustomValidity(
                        'この項目は必須です。'
                    );
                } else if (
                    field.type === 'email' &&
                    (
                        field.validity.typeMismatch ||
                        field.validity.patternMismatch
                    )
                ) {
                    field.setCustomValidity(
                        '正しいメールアドレスを入力してください。'
                    );
                }
            });

            field.addEventListener('input', () => {
                field.setCustomValidity('');
            });
        });

        const submitButton =
            contactForm.querySelector(
                '.contact-form__submit'
            );

        const status =
            contactForm.querySelector(
                '.contact-form__status'
            );

        if (submitButton && status) {
            contactForm.addEventListener(
                'submit',
                async (event) => {
                    event.preventDefault();

                    if (!contactForm.reportValidity()) {
                        return;
                    }

                    status.textContent = '';

                    status.classList.remove(
                        'is-success',
                        'is-error'
                    );

                    submitButton.disabled = true;

                    contactForm.setAttribute(
                        'aria-busy',
                        'true'
                    );

                    try {
                        const response = await fetch(
                            contactForm.getAttribute('action'),
                            {
                                method: 'POST',
                                body: new FormData(
                                    contactForm
                                ),
                                credentials: 'same-origin',
                            }
                        );

                        const data =
                            await response.json();

                        if (!data.success) {
                            throw new Error(
                                data.data?.message ||
                                '送信に失敗しました。'
                            );
                        }

                        status.textContent =
                            data.data.message;

                        status.classList.add(
                            'is-success'
                        );

                        contactForm.reset();
                    } catch (error) {
                        console.error(
                            'Contact form error:',
                            error
                        );

                        status.textContent =
                            error.message ||
                            '送信に失敗しました。';

                        status.classList.add(
                            'is-error'
                        );
                    } finally {
                        submitButton.disabled = false;

                        contactForm.removeAttribute(
                            'aria-busy'
                        );
                    }
                }
            );
        }
    }


    // =====================================================
    // Service Dialog
    // =====================================================

    const serviceDialog =
        document.querySelector('#service-dialog');

    if (!serviceDialog) return;

    const closeButton =
        serviceDialog.querySelector(
            '.service-dialog__close'
        );

    const loadedContent =
        serviceDialog.querySelector(
            '.service-dialog__loaded'
        );

    if (!closeButton || !loadedContent) return;

    const serviceCache = new Map();

    let requestId = 0;


    // =====================================================
    // Open Service
    // =====================================================

    const openService = async (serviceId) => {
        const currentRequest = ++requestId;

        [...serviceDialog.classList].forEach(
            (className) => {
                if (
                    className.startsWith(
                        'service-dialog--'
                    )
                ) {
                    serviceDialog.classList.remove(
                        className
                    );
                }
            }
        );

        serviceDialog.classList.add(
            `service-dialog--${serviceId}`
        );

        try {
            let html;

            if (serviceCache.has(serviceId)) {
                html =
                    serviceCache.get(serviceId);
            } else {
                const response = await fetch(
                    `/wp-json/sun-auto/v1/service/${serviceId}`
                );

                if (!response.ok) {
                    throw new Error(
                        `Service request failed: ${response.status}`
                    );
                }

                const data =
                    await response.json();

                html = data.html;

                serviceCache.set(
                    serviceId,
                    html
                );
            }

            if (currentRequest !== requestId) {
                return;
            }

            loadedContent.innerHTML = html;

            if (!serviceDialog.open) {
                serviceDialog.showModal();
            }

            if (window.Typekit) {
                try {
                    window.Typekit.load({
                        async: true,
                    });
                } catch (error) {
                    console.warn(
                        'Typekit could not reload.',
                        error
                    );
                }
            }
        } catch (error) {
            console.error(
                'Unable to load service:',
                error
            );
        }
    };


    // =====================================================
    // Service Buttons
    // =====================================================

    document.addEventListener(
        'click',
        (event) => {
            const trigger =
                event.target.closest(
                    '[data-service]'
                );

            if (!trigger) return;

            const serviceId =
                trigger.dataset.service;

            if (!serviceId) return;

            openService(serviceId);
        }
    );


    // =====================================================
    // Close Button
    // =====================================================

    closeButton.addEventListener('click', () => {
        serviceDialog.close();
    });


    // =====================================================
    // Backdrop Click
    // =====================================================

    serviceDialog.addEventListener(
        'click',
        (event) => {
            if (event.target === serviceDialog) {
                serviceDialog.close();
            }
        }
    );


    // =====================================================
    // Dialog Close
    // =====================================================

    serviceDialog.addEventListener(
        'close',
        () => {
            loadedContent.innerHTML = '';

            [...serviceDialog.classList].forEach(
                (className) => {
                    if (
                        className.startsWith(
                            'service-dialog--'
                        )
                    ) {
                        serviceDialog.classList.remove(
                            className
                        );
                    }
                }
            );
        }
    );
});