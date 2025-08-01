<?php


$current = time();
if (mktime(0, 0, 0, 11, 25, 2024) <= $current && $current < mktime(0, 0, 0, 12, 4, 2024)) {
    if (get_option('nsl_bf_2024') != '1') {

        add_action('admin_notices', function () {
            ?>
            <div class="notice notice-info is-dismissible" data-nsldismissable="nsl_bf_2024" style="display:grid;grid-template-columns: 100px auto;padding-top: 25px; padding-bottom: 22px;">
                <img alt="Nextend Social Login" src="<?php echo plugins_url('images/notice/nslnotice.png', NSL_ADMIN_PATH) ?>" width="64" height="64" style="grid-row: 1 / 4; align-self: center;justify-self: center">
                <h3 style="margin:0;">Nextend Social Login - Black Friday Deal</h3>
                <p style="margin:0 0 2px;">Don't miss out on our biggest sale of the year! Get your <b>Pro Addon</b>
                    with <b>up to 50% OFF</b> to access <b>WooCommerce support</b>, <b>Apple provider</b> and much more!
                    This limited time offer expires on December 3.</p>
                <p style="margin:0;">
                    <a class="button button-primary" href="https://social-login.nextendweb.com/?coupon=BF2024&utm_source=wpfree&utm_medium=wp&utm_campaign=bf24#pricing" target="_blank">
                        Buy Now</a>
                    <a class="button button-dismiss" href="#">Dismiss</a>
                </p>
            </div>
            <?php
        });

        add_action('admin_footer', function () {
            ?>
            <script>
                (function () {
                    function ready(fn) {
                        if (document.readyState === "complete" || document.readyState === "interactive") {
                            fn();
                        } else {
                            document.addEventListener("DOMContentLoaded", fn);
                        }
                    }

                    function serialize(obj) {
                        return Object.keys(obj).reduce(function (a, k) {
                            a.push(k + '=' + encodeURIComponent(obj[k]));
                            return a;
                        }, []).join('&');
                    }

                    ready(function () {
                        setTimeout(function () {
                            const buttons = document.querySelectorAll("div[data-nsldismissable] .notice-dismiss, div[data-nsldismissable] .button-dismiss");
                            for (let i = 0; i < buttons.length; i++) {
                                buttons[i].addEventListener('click', function (e) {
                                    e.preventDefault();

                                    const http = new XMLHttpRequest();
                                    http.open('POST', ajaxurl, true);
                                    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded; charset=UTF-8");

                                    http.send(serialize({
                                        'action': 'nsl_dismiss_admin_notice',
                                        'nonce': <?php echo json_encode(wp_create_nonce('nsl-dismissible-notice')); ?>
                                    }));

                                    e.target.closest('.is-dismissible').remove();
                                });
                            }
                        }, 1000);
                    });
                })();
            </script>
            <?php
        });

        add_action('wp_ajax_nsl_dismiss_admin_notice', function () {
            check_ajax_referer('nsl-dismissible-notice', 'nonce');

            update_option('nsl_bf_2024', '1');
            wp_die();
        });
    }
}
