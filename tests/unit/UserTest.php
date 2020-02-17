<?php
use PHPUnit\Framework\TestCase;
use App\Models\User;

class UserTest extends TestCase {

    public function setUp() : void 
    {
        $this->user = new User;
    }

    public function testThatWeCanGetUserFirstName()
    {
        $testFirstName = 'Alex';
        $this->user->setFirstName($testFirstName);
        $this->assertEquals($this->user->getFirstName(), $testFirstName);
    }

    public function testThatWeCanGetUserLastName() 
    {
        $testLastName = 'Alexis';
        $this->user->setLastName($testLastName);
        $this->assertEquals($this->user->getLastName(), $testLastName);

    }

    public function testFulUserNameCanBeReturn(Type $var = null)
    {
        $testFirstName = 'Alex';
        $testLastName = 'Alexis';
        $this->user->setFirstName($testFirstName);
        $this->user->setLastName($testLastName);
        $this->assertEquals($this->user->getFullName(), 'Alex Alexis');
    }

    public function testThatFirstNAmeAndLastNameAreTrimmed()
    {
        $testFirstName = '  Alex    ';
        $testLastName = '  Alexis ';
        $this->user->setFirstName($testFirstName);
        $this->user->setLastName($testLastName);
        $this->assertEquals($this->user->getFullName(), 'Alex Alexis');
    }

    public function testEmailCanBeSet()
    {
        $testEmail = 'test@mail.com';
        $this->user->setEmail($testEmail);
        $this->assertEquals($this->user->getEmail($testEmail), $testEmail);
    }

    public function testEmailVariablesHasCorrectData()
    {
        $testFirstName = '  Alex    ';
        $testLastName = '  Alexis ';
        $this->user->setFirstName($testFirstName);
        $this->user->setLastName($testLastName);
        $testEmail = 'test@mail.com';
        $this->user->setEmail($testEmail);
        $emailVariables = $this->user->getEmailVariabls();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($this->user->getFullName(), $emailVariables['full_name']);
        $this->assertEquals($this->user->getEmail(), $emailVariables['email']);


    }
}
