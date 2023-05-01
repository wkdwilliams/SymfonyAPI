<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class TestType extends AbstractType
{
    // public function asArray(): array
    // {
    //     return [
    //         'id' => $this->id,
    //         'title' => $this->title,
    //         'content' => $this->content
    //     ];
    // }
}