<?php

/**
 * BaseTipoOperacao
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $tipo
 * @property Doctrine_Collection $ContaOperacao
 * 
 * @method string              getTipo()          Returns the current record's "tipo" value
 * @method Doctrine_Collection getContaOperacao() Returns the current record's "ContaOperacao" collection
 * @method TipoOperacao        setTipo()          Sets the current record's "tipo" value
 * @method TipoOperacao        setContaOperacao() Sets the current record's "ContaOperacao" collection
 * 
 * @package    Encurtador
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTipoOperacao extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tipo_operacao');
        $this->hasColumn('tipo', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('ContaOperacao', array(
             'local' => 'id',
             'foreign' => 'tipo_operacao_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}