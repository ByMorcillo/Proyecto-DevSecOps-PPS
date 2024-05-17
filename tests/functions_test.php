<?php
use PHPUnit\Framework\TestCase;

include('../platform/functions.php');

class Functions1Test extends TestCase
{
    public function testCheckPassword()
    {
        $this->assertTrue(checkPassword('Abcdefg1'));
        $this->assertFalse(checkPassword('abc123')); // No contiene mayúsculas
        $this->assertFalse(checkPassword('ABCDEFGH')); // No contiene minúsculas
        $this->assertFalse(checkPassword('Abcdefgh')); // No contiene números
        $this->assertFalse(checkPassword('Abcde1')); // La longitud es menor que 8
    }

    public function testCheckDNI()
    {
        $this->assertTrue(checkDNI('12345678Z'));
        $this->assertFalse(checkDNI('1234567Z')); // Longitud incorrecta
        $this->assertFalse(checkDNI('12345678A')); // Letra incorrecta
        $this->assertFalse(checkDNI('12345678')); // Falta letra
        $this->assertFalse(checkDNI('ABC12345X')); // DNI contiene letras en lugar de números
    }

    public function testCipherPass()
    {
        $password = 'TestPassword123';
        $ciphertext = cipherPass($password);
        $this->assertNotEquals($password, $ciphertext); // La contraseña cifrada debe ser diferente a la original
    }
}
?>