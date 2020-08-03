<?php
namespace cadastronis\entity;
require '../../source/model/pessoa.php';
use cadastronis\entity\Pessoa;

class PessoaTest extends \PHPUnit_Framework_TestCase 
{
    private $entity;

    protected function setUp()
    {
        $this->entity = new Pessoa;
    }

    public function testId()
    {
        $this->entity->setId(0);
        $this->assertEquals(0, $this->entity->getId());
    }

    public function testNome()
    {
        $this->entity->setName('Teste Pessoa');
        $this->assertEquals('Teste Pessoa', $this->entity->getName());
    }

    public function testNis()
    {
        $this->entity->setNis('00000000000');
        $this->assertEquals('00000000000', $this->entity->getNis());
    }
}
