```php
<?php

use PHPUnit\Framework\TestCase;
require_once 'src/CustomizableTemplates.php';

class CustomizableTemplatesTest extends TestCase {

    private $customizableTemplates;

    protected function setUp(): void {
        $this->customizableTemplates = new CustomizableTemplates();
    }

    public function testEmailTemplateExists() {
        $this->assertFileExists('templates/email_template.php');
    }

    public function testSMSTemplateExists() {
        $this->assertFileExists('templates/sms_template.php');
    }

    public function testNotificationTemplateExists() {
        $this->assertFileExists('templates/notification_template.php');
    }

    public function testCustomizeEmailTemplate() {
        $emailTemplate = $this->customizableTemplates->customizeEmailTemplate('Welcome', 'Welcome to IntimateTales');
        $this->assertStringContainsString('Welcome', $emailTemplate);
        $this->assertStringContainsString('Welcome to IntimateTales', $emailTemplate);
    }

    public function testCustomizeSMSTemplate() {
        $smsTemplate = $this->customizableTemplates->customizeSMSTemplate('Invitation', 'You are invited to join IntimateTales');
        $this->assertStringContainsString('Invitation', $smsTemplate);
        $this->assertStringContainsString('You are invited to join IntimateTales', $smsTemplate);
    }

    public function testCustomizeNotificationTemplate() {
        $notificationTemplate = $this->customizableTemplates->customizeNotificationTemplate('Story Update', 'A new chapter has been added');
        $this->assertStringContainsString('Story Update', $notificationTemplate);
        $this->assertStringContainsString('A new chapter has been added', $notificationTemplate);
    }

    protected function tearDown(): void {
        $this->customizableTemplates = NULL;
    }
}
```