<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('check contact page');
$I->amOnPage('index.php?r=contact');
$I->see('Kontakt');
$I->fillField('#contactemail-name','davert');
$I->fillField('ContactEmail[email]', 'qwerty@wp.pl');
$I->fillField('ContactEmail[subject]', 'subject');
$I->fillField('ContactEmail[message]', 'content');
$I->click('#send-email-btn');