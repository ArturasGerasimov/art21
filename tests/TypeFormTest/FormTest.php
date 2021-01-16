<?php


namespace App\Tests\TypeFormTest;


use App\Entity\User;
use App\Form\EmployType;
use Symfony\Component\Form\Test\TypeTestCase;

class FormTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $formData = [
            'test' => 'test',
            'test2' => 'test2',
        ];

        $model = new User();
        // $formData will retrieve data from the form submission; pass it as the second argument
        $form = $this->factory->create(EmployType::class, $model);

        $expected = new User();
        // ...populate $object properties with the data stored in $formData

        // submit the data to the form directly
        $form->submit($formData);

        // This check ensures there are no transformation failures
        $this->assertTrue($form->isSynchronized());

        // check that $formData was modified as expected when the form was submitted
        $this->assertEquals($expected, $model);
    }
}