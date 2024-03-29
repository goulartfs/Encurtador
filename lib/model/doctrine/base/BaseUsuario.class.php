<?php

/**
 * BaseUsuario
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property integer $tipo_usuario_id
 * @property integer $referal_id
 * @property string $endereco
 * @property string $estado
 * @property string $cidade
 * @property string $cep
 * @property string $telefone
 * @property string $referal_code
 * @property sfGuardUser $sfGuardUser
 * @property sfGuardUser $Referal
 * @property TipoUsuario $TipoUsuario
 * 
 * @method integer     getUserId()          Returns the current record's "user_id" value
 * @method integer     getTipoUsuarioId()   Returns the current record's "tipo_usuario_id" value
 * @method integer     getReferalId()       Returns the current record's "referal_id" value
 * @method string      getEndereco()        Returns the current record's "endereco" value
 * @method string      getEstado()          Returns the current record's "estado" value
 * @method string      getCidade()          Returns the current record's "cidade" value
 * @method string      getCep()             Returns the current record's "cep" value
 * @method string      getTelefone()        Returns the current record's "telefone" value
 * @method string      getReferalCode()     Returns the current record's "referal_code" value
 * @method sfGuardUser getSfGuardUser()     Returns the current record's "sfGuardUser" value
 * @method sfGuardUser getReferal()         Returns the current record's "Referal" value
 * @method TipoUsuario getTipoUsuario()     Returns the current record's "TipoUsuario" value
 * @method Usuario     setUserId()          Sets the current record's "user_id" value
 * @method Usuario     setTipoUsuarioId()   Sets the current record's "tipo_usuario_id" value
 * @method Usuario     setReferalId()       Sets the current record's "referal_id" value
 * @method Usuario     setEndereco()        Sets the current record's "endereco" value
 * @method Usuario     setEstado()          Sets the current record's "estado" value
 * @method Usuario     setCidade()          Sets the current record's "cidade" value
 * @method Usuario     setCep()             Sets the current record's "cep" value
 * @method Usuario     setTelefone()        Sets the current record's "telefone" value
 * @method Usuario     setReferalCode()     Sets the current record's "referal_code" value
 * @method Usuario     setSfGuardUser()     Sets the current record's "sfGuardUser" value
 * @method Usuario     setReferal()         Sets the current record's "Referal" value
 * @method Usuario     setTipoUsuario()     Sets the current record's "TipoUsuario" value
 * 
 * @package    Encurtador
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUsuario extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('usuario');
        $this->hasColumn('user_id', 'integer', 11, array(
             'type' => 'integer',
             'length' => 11,
             ));
        $this->hasColumn('tipo_usuario_id', 'integer', 11, array(
             'type' => 'integer',
             'length' => 11,
             ));
        $this->hasColumn('referal_id', 'integer', 11, array(
             'type' => 'integer',
             'length' => 11,
             ));
        $this->hasColumn('endereco', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('estado', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('cidade', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('cep', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('telefone', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('referal_code', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('sfGuardUser as Referal', array(
             'local' => 'referal_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('TipoUsuario', array(
             'local' => 'tipo_usuario_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT',
             'onUpdate' => 'RESTRICT'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}