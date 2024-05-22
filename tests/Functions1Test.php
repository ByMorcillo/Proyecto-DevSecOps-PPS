<?php
use PHPUnit\Framework\TestCase;

include('../platform/functionsTest.php');

class Functions1Test extends TestCase
{
    public function testCheckPassword()
    {
	$funcion = new Functions1();
        $this->assertTrue($funcion->checkPassword('Abcdefg1'));
        $this->assertFalse($funcion->checkPassword('abc123')); // No contiene mayúsculas
        $this->assertFalse($funcion->checkPassword('ABCDEFGH')); // No contiene minúsculas
        $this->assertFalse($funcion->checkPassword('Abcdefgh')); // No contiene números
        $this->assertFalse($funcion->checkPassword('Abcde1')); // La longitud es menor que 8
    }

    public function testCheckDNI()
    {
	$funcion = new Functions1();
        $this->assertTrue($funcion->checkDNI('12345678Z'));
        $this->assertFalse($funcion->checkDNI('1234567Z')); // Longitud incorrecta
        $this->assertFalse($funcion->checkDNI('12345678A')); // Letra incorrecta
        $this->assertFalse($funcion->checkDNI('12345678')); // Falta letra
        $this->assertFalse($funcion->checkDNI('ABC12345X')); // DNI contiene letras en lugar de números
    }

    public function testCipherPass()
    {
	$funcion = new Functions1();
        $password = 'TestPassword123';
        $ciphertext = $funcion->cipherPass($password);
        $this->assertNotEquals($password, $ciphertext); // La contraseña cifrada debe ser diferente a la original
    }
}
?>
