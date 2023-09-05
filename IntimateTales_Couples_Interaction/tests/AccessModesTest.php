```php
<?php

use PHPUnit\Framework\TestCase;
use IntimateTales_Couples_Interaction_Plugin\src\AccessModes;

class AccessModesTest extends TestCase {

    private $accessModes;

    protected function setUp(): void {
        $this->accessModes = new AccessModes();
    }

    public function testInvitePartnerByEmail() {
        $email = 'partner@example.com';
        $result = $this->accessModes->invitePartnerByEmail($email);
        $this->assertTrue($result);
    }

    public function testInvitePartnerByMobileNumber() {
        $mobileNumber = '1234567890';
        $result = $this->accessModes->invitePartnerByMobileNumber($mobileNumber);
        $this->assertTrue($result);
    }

    public function testValidateInvitation() {
        $invitationCode = 'abc123';
        $result = $this->accessModes->validateInvitation($invitationCode);
        $this->assertTrue($result);
    }

    protected function tearDown(): void {
        unset($this->accessModes);
    }
}
```