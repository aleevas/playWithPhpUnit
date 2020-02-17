<?php
use PHPUnit\Framework\TestCase;
use App\Models\User;

class UserTest extends TestCase {

    public function testTrueAssertToTrue()
    {
        $this->assertTrue(TRUE);
    }

    public function testThatWeCanGetUserFirstName()
    {
        $user = new User;
        $testFirstName = 'Alex';
        $user->setFirstName($testFirstName);
        $this->assertEquals($user->getFirstName(), $testFirstName);
    }

    public function testThatWeCanGetUserLastName() 
    {
        $user = new User;
        $testLastName = 'Alexis';
        $user->setLastName($testLastName);
        $this->assertEquals($user->getLastName(), $testLastName);

    }

    public function testFulUserNameCanBeReturn(Type $var = null)
    {
        $user = new User;
        $testFirstName = 'Alex';
        $testLastName = 'Alexis';
        $user->setFirstName($testFirstName);
        $user->setLastName($testLastName);
        $this->assertEquals($user->getFullName(), 'Alex Alexis');
    }

    public function testThatFirstNAmeAndLastNameAreTrimmed()
    {
        $user = new User;
        $testFirstName = '  Alex    ';
        $testLastName = '  Alexis ';
        $user->setFirstName($testFirstName);
        $user->setLastName($testLastName);
        $this->assertEquals($user->getFullName(), 'Alex Alexis');
    }

    public function testEmailCanBeSet()
    {
        $user = new User;
        $testEmail = 'test@mail.com';
        $user->setEmail($testEmail);
        $this->assertEquals($user->getEmail($testEmail), $testEmail);
    }

    public function testEmailVariablesHasCorrectData()
    {
        $user = new User;
        $testFirstName = '  Alex    ';
        $testLastName = '  Alexis ';
        $user->setFirstName($testFirstName);
        $user->setLastName($testLastName);
        $testEmail = 'test@mail.com';
        $user->setEmail($testEmail);
        $emailVariables = $user->getEmailVariabls();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($user->getFullName(), $emailVariables['full_name']);
        $this->assertEquals($user->getEmail(), $emailVariables['email']);


    }
}
