<?php

class FeedbackCest
{
    public function _before(\FunctionalTester $I)
    {
        $I->amLoggedInAs(1);
    }

    public function sendFeedbackSuccessfully(\FunctionalTester $I)
    {
        $I->amOnRoute('feedback/create');
        $I->submitForm('form', [
            'Feedback[nome]' => 'JohnTitor',
            'Feedback[email]' => 'JohnTitor@hotmail.com',
            'Feedback[idade]' => '36',
            'Feedback[feedback]' => 'Im in 2001!',
        ]);
        $I->expectTo('Encontrar registro na Base de Dados.');
        $result = $I->grabRecord('\app\models\Feedback',[
            'nome' => 'JohnTitor',
            'email' => 'JohnTitor@hotmail.com',
            'idade' => '36',
            'feedback' => 'Im in 2001!',
        ]);
        $I->assertNotEquals($result, null);
    }

    # vendor/bin/codecept run functional FeedbackCest --steps
    public function sendFeedbackWithInvalidMX(\FunctionalTester $I)
    {
        $I->amOnRoute('feedback/create');
        $I->submitForm('form', [
            'Feedback[nome]' => 'JohnTitor',
            'Feedback[email]' => 'JohnTitor@thisisntavalidmxiguesspleasedontbevalid.com',
            'Feedback[idade]' => '36',
            'Feedback[feedback]' => 'Im in 2001!',
        ]);

        $I->expectTo('Ver a mensagem de erro na tela.');
        $I->see('"E-mail" não é um endereço de e-mail válido.');

        $I->expectTo('Não encontrar o registro na Base de Dados.');
        $result = $I->grabRecord('\app\models\Feedback',[
            'nome' => 'JohnTitor',
            'email' => 'JohnTitor@thisisntavalidmxiguesspleasedontbevalid.com',
            'idade' => '36',
            'feedback' => 'Im in 2001!',
        ]);
        $I->assertEquals($result, null);
    }

    public function sendFeedbackWithoutAt(\FunctionalTester $I)
    {
        $I->amOnRoute('feedback/create');
        $I->submitForm('form', [
            'Feedback[nome]' => 'JohnTitor',
            'Feedback[email]' => 'JohnTitorgmail.com',
            'Feedback[idade]' => '36',
            'Feedback[feedback]' => 'Im in 2001!',
        ]);

        $I->expectTo('Ver a mensagem de erro na tela.');
        $I->see('"E-mail" não é um endereço de e-mail válido.');

        $I->expectTo('Não encontrar o registro na Base de Dados.');
        $result = $I->grabRecord('\app\models\Feedback',[
            'nome' => 'JohnTitor',
            'email' => 'JohnTitorgmail.com',
            'idade' => '36',
            'feedback' => 'Im in 2001!',
        ]);
        $I->assertEquals($result, null);
    }

}