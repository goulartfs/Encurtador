<?php

/**
 * BaseContaTransacao
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $conta_id
 * @property string $auth_key
 * @property float $valor
 * @property boolean $is_processed
 * @property Conta $Conta
 * 
 * @method integer        getContaId()      Returns the current record's "conta_id" value
 * @method string         getAuthKey()      Returns the current record's "auth_key" value
 * @method float          getValor()        Returns the current record's "valor" value
 * @method boolean        getIsProcessed()  Returns the current record's "is_processed" value
 * @method Conta          getConta()        Returns the current record's "Conta" value
 * @method ContaTransacao setContaId()      Sets the current record's "conta_id" value
 * @method ContaTransacao setAuthKey()      Sets the current record's "auth_key" value
 * @method ContaTransacao setValor()        Sets the current record's "valor" value
 * @method ContaTransacao setIsProcessed()  Sets the current record's "is_processed" value
 * @method ContaTransacao setConta()        Sets the current record's "Conta" value
 * 
 * @package    Encurtador
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseContaTransacao extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('conta_transacao');
        $this->hasColumn('conta_id', 'integer', 11, array(
             'type' => 'integer',
             'length' => 11,
             ));
        $this->hasColumn('auth_key', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('valor', 'float', 11, array(
             'type' => 'float',
             'length' => 11,
             'scale' => '6',
             ));
        $this->hasColumn('is_processed', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 0,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Conta', array(
             'local' => 'conta_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT',
             'onUpdate' => 'RESTRICT'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}