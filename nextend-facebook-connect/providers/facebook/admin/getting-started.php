<?php
defined('ABSPATH') || die();
/** @var $this NextendSocialProviderAdmin */

$lastUpdated = '2025-05-05';

$provider = $this->getProvider();
?>
<div class="nsl-admin-sub-content">
    <?php if (substr($provider->getLoginUrl(), 0, 8) !== 'https://'): ?>
        <div class="error">
            <p><?php printf(__('%1$s allows HTTPS OAuth Redirects only. You must move your site to HTTPS in order to allow login with %1$s.', 'nextend-facebook-connect'), 'Facebook'); ?></p>
            <p>
                <a href="https://social-login.nextendweb.com/documentation/providers/facebook/#enforce-https" target="_blank"><?php _e('How to get SSL for my WordPress site?', 'nextend-facebook-connect'); ?></a>
            </p>
        </div>
    <?php else: ?>
        <div class="nsl-admin-getting-started">
            <h2 class="title"><?php _e('Getting Started', 'nextend-facebook-connect'); ?></h2>

            <p><?php printf(__('To allow your visitors to log in with their %1$s account, first you must create a %1$s App. The following guide will help you through the %1$s App creation process. After you have created your %1$s App, head over to "Settings" and configure the given "%2$s" and "%3$s" according to your %1$s App.', 'nextend-facebook-connect'), "Facebook", "App ID", "App secret"); ?></p>

            <p><?php do_action('nsl_getting_started_warnings', $provider, $lastUpdated); ?></p>

            <p><?php printf(__('<u><b>WARNING:</b></u> As of February 1, 2023, %1$s requires Business Verification for Advanced Access, which is necessary for the Facebook login feature. This means that, individuals can no longer use %1$s login on their websites to offer social login for their visitors, only verified businesses will be able to use this provider! For more information about this limitation, please check the %2$sofficial statement%3$s. ', 'nextend-facebook-connect'), 'Facebook', '<a href="https://developers.facebook.com/blog/post/2023/02/01/developer-platform-requiring-business-verification-for-advanced-access/" target="_blank">', '</a>'); ?></p>

            <h2 class="title"><?php printf(_x('Create %s', 'App creation', 'nextend-facebook-connect'), 'Facebook App'); ?></h2>

            <ol>
                <li><?php printf(__('Navigate to %s', 'nextend-facebook-connect'), '<a href="https://developers.facebook.com/apps/" target="_blank">https://developers.facebook.com/apps/</a>'); ?></li>
                <li><?php printf(__('Log in with your %s credentials if you are not logged in.', 'nextend-facebook-connect'), 'Facebook'); ?></li>
                <li><?php printf(__('Click on the %1$s button.', 'nextend-facebook-connect'), '"<b>Create App</b>"'); ?></li>
                <li><?php printf(__('If presented with a modal, close it or click on the %1$s button again.', 'nextend-facebook-connect'), '"<b>Create App</b>"'); ?></li>
                <li><?php printf(__('Fill the %1$s and %2$s fields. The specified app name will appear on your %3$s!', 'nextend-facebook-connect'), '"<b>App name</b>"', '"<b>App contact email</b>"', '<a href="https://developers.facebook.com/docs/facebook-login/permissions/overview/" target="_blank">Consent Screen</a>'); ?></li>
                <li><?php printf(__('Click on the %1$s button and choose the %2$s option!', 'nextend-facebook-connect'), '"<b>Next</b>"', '"<b>Authenticate and request data from users with Facebook Login</b>"'); ?></li>
                <li><?php printf(__('%1$sOptional%2$s: choose a %3$s if you would like to. If you didn\'t choose a %3$s at this point, you will need to select it in step 26, before you start the %4$s!', 'nextend-facebook-connect'), '<b>', '</b>', '"<b>Business portfolio</b>"', '"<b>Verification</b>"'); ?></li>
                <li><?php printf(__('Click on the %1$s button, read the documents listed below the requirements, then click %1$s again.', 'nextend-facebook-connect'), '"<b>Next</b>"'); ?></li>
                <li><?php printf(__('Check the App details in the %1$s, and then press the %2$s button.', 'nextend-facebook-connect'), '"Overview"', '"<b>Go to dashboard</b>"'); ?></li>
                <li><?php printf(__('Complete the security check if you are prompted with the modal.', 'nextend-facebook-connect')); ?></li>
                <li><?php printf(__('You will end up in the %1$s. If you see a modal window appear, close it or click on %2$s.', 'nextend-facebook-connect'), '"Dashboard"', '"<b>Go to dashboard</b>"'); ?></li>
                <li><?php printf(__('Click on the %1$s tab on the left side and then click on the %2$s button that appears next to the %3$s item.', 'nextend-facebook-connect'), '"<b>Use cases</b>"', '"<b>Customize</b>"', '"<b>Authenticate and request data from users with Facebook Login</b>"'); ?></li>
                <li><?php printf(__('Below the %1$s section, find the %2$s permission and click on the %3$s button.', 'nextend-facebook-connect'), '"<b>Permissions</b>"', '"<b>email</b>"', '"<b>Add</b>"'); ?></li>
                <li><?php printf(__('Press the %1$s option that you can find below the %2$s section.', 'nextend-facebook-connect'), '"<b>Settings</b>"', '"<b>Facebook Login</b>"'); ?></li>
                <li><?php
                    $loginUrls = $provider->getAllRedirectUrisForAppCreation();
                    printf(__('Add the following URL to the %s field:', 'nextend-facebook-connect'), '"<b>Valid OAuth redirect URIs</b>"');
                    echo "<ul>";
                    foreach ($loginUrls as $loginUrl) {
                        echo "<li><strong>" . $loginUrl . "</strong></li>";
                    }
                    echo "</ul>";
                    ?>
                </li>
                <li><?php printf(__('Click on the %1$s button. (If you receive a blank page after you pressed the %1$s button, you might need to refresh the page.)', 'nextend-facebook-connect'), '"<b>Save changes</b>"'); ?></li>
                <li><?php printf(__('On the left side in the side bar, click on the gear icon ( %1$s ) then click %2$s.', 'nextend-facebook-connect'), '"<b>App settings</b>"', '"<b>Basic</b>"') ?></li>
                <li><?php printf(__('Enter your domain name to the %1$s field, probably: %2$s', 'nextend-facebook-connect'), '"<b>App Domains</b>"', '<b>' . str_replace('www.', '', $_SERVER['HTTP_HOST']) . '</b>'); ?></li>
                <li><?php printf(__('Fill up the %1$s field. Provide a publicly available and easily accessible privacy policy that explains what data you are collecting and how you will use that data.', 'nextend-facebook-connect'), '"<b>Privacy Policy URL</b>"'); ?></li>
                <li><?php printf(__('Fill up the %1$s field. Provide a publicly available terms and conditions page link, where you describe the rules and guidelines that your visitors must agree to.', 'nextend-facebook-connect'), '"<b>Terms of Service URL</b>"'); ?></li>
                <li><?php printf(__('At %1$s, choose the %2$s option, and enter the %3$s with the instructions on how users can delete their accounts on your site.', 'nextend-facebook-connect'), '"<b>User Data Deletion</b>"', '"<b>Data Deletion Instructions URL</b>"', '<i>URL of your page</i>*'); ?>
                    <ul>
                        <li><?php _e('To comply with GDPR, you should already offer possibility to delete accounts on your site, either by the user or by the admin:', 'nextend-facebook-connect'); ?></li>
                        <li>
                            <ul>
                                <li><?php printf(__('%1$sIf each user has an option to delete the account%2$s: the URL should point to a guide showing the way users can delete their accounts.', 'nextend-facebook-connect'), '<u>', '</u>'); ?></li>
                                <li><?php printf(__('%1$sIf the accounts are deleted by an admin%2$s: then you should have a section - usually in the Privacy Policy - with the contact details, where users can send their account erasure requests. In this case the URL should point to this section of the document.', 'nextend-facebook-connect'), '<u>', '</u>'); ?></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><?php printf(__('Select a %1$s, an %2$s.', 'nextend-facebook-connect'), '"<b>Category</b>"', '"<b>App Icon</b>"'); ?></li>
                <li><?php printf(__('Scroll down to the bottom of the page, press the %s button.', 'nextend-facebook-connect'), '"<b>+ Add platform</b>"'); ?></li>
                <li><?php printf(__('Select %1$s platform, then press %2$s and enter the following URL into the %3$s field: %4$s', 'nextend-facebook-connect'), '"<b>Website</b>"', '"<b>Next</b>"', '"<b>Website > Site URL</b>"', '<b>' . site_url() . '</b>'); ?></li>
                <li><?php printf(__('Press the %s button.', 'nextend-facebook-connect'), '"<b>Save changes</b>"'); ?></li>
                <li><?php printf(__('By default, your application only has Standard Access for the %1$s and %2$s permissions, which means that only you can log in with it. To get Advanced Access you will need to go trough the %3$s, that you can start on the %4$s tab on the left side.', 'nextend-facebook-connect'), '"public_profile"', '"email"', '<a href="https://developers.facebook.com/docs/development/release/business-verification" target="_blank">Business Verification</a>', '"<b>Review > Verification</b>"'); ?></li>
                <li><?php printf(__('After a successful Business Verification, you need to go to the %1$s tab, and open the review request with the %2$s button. Fill in any missing fields here, then submit the form for review, and wait until it is approved by Meta, which may take several days.', 'nextend-facebook-connect'), '"<b>Review > App Review</b>"', '"<b>Edit</b>"'); ?></li>
                <li><?php printf(__('Once your verification is completed, click on the %1$s tab. ', 'nextend-facebook-connect'), '"<b>Publish</b>"'); ?></li>
                <li><?php printf(__('To obtain access to permissions, you must answer some questions about your data handling practices, click on the %1$s link, that you find next to %2$s and answer questions about the data handling.', 'nextend-facebook-connect'), '"<b>Go to data handling questions</b>"', '"<b>Data handling questions</b>"'); ?></li>
                <li><?php printf(__('Currently your app is in Development Mode which also means that people outside of your business can not use it. To change this, click on the %1$s option on the left side again, and publish your app by clicking on the blue %1$s button at the bottom right corner.', 'nextend-facebook-connect'), '"<b>Publish</b>"'); ?></li>
                <li><?php printf(__('After everything is done, click on the %1$s tab, then click %2$s.', 'nextend-facebook-connect'), '"<b>App settings</b>"', '"<b>Basic</b>"') ?></li>
                <li><?php printf(__('At the top of the page you can find your %1$s and you can see your %2$s if you click on the %3$s button. These will be needed in plugin’s settings.', 'nextend-facebook-connect'), '"<b>App ID</b>"', '"<b>App secret</b>"', 'Show'); ?></li>
            </ol>

            <p><?php printf(__('<b>WARNING:</b> <u>Don\'t replace your Facebook App with another!</u> Since WordPress users with linked Facebook accounts can only login using the %1$s App, that was originally used at the time, when the WordPress account was linked with a %1$s Account.<br>
If you would like to know the reason of this, or you really need to replace the Facebook App, then please check our %2$sdocumentation%3$s.', 'nextend-facebook-connect'), 'Facebook', '<a href="https://social-login.nextendweb.com/documentation/providers/facebook/#app-scoped-user-id" target="_blank">', '</a>'); ?></p>

            <br>
            <h2 class="title"><?php _e('Maintaining the Facebook App:', 'nextend-facebook-connect'); ?></h2>
            <p><?php printf(__('<strong><u>Facebook Data Use Checkup:</u></strong> To protecting people\'s privacy, Facebook might requests you to fill some forms, so they can ensure that your API access and data use comply with the Facebook policies.
If Facebook displays the "%1$s" modal for your App, then in our %2$sdocumentation%3$s you can find more information about the permissions that we need.', 'nextend-facebook-connect'), 'Data Use Checkup', '<a href="https://social-login.nextendweb.com/documentation/providers/facebook/#data-use-checkup" target="_blank">', '</a>'); ?></p>

            <a href="<?php echo $this->getUrl('settings'); ?>"
               class="button button-primary"><?php printf(__('I am done setting up my %s', 'nextend-facebook-connect'), 'Facebook App'); ?></a>
        </div>
    <?php endif; ?>
</div>