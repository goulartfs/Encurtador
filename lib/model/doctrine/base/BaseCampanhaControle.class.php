<?php

/**
 * BaseCampanhaControle
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $campanha_id
 * @property string $ip_viewer
 * @property boolean $is_processed
 * 
 * @method integer          getCampanhaId()   Returns the current record's "campanha_id" value
 * @method string           getIpViewer()     Returns the current record's "ip_viewer" value
 * @method boolean          getIsProcessed()  Returns the current record's "is_processed" value
 * @method CampanhaControle setCampanhaId()   Sets the current record's "campanha_id" value
 * @method CampanhaControle setIpViewer()     Sets the current record's "ip_viewer" value
 * @method CampanhaControle setIsProcessed()  Sets the current record's "is_processed" value
 * 
 * @package    Encurtador
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCampanhaControle extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('campanha_controle');
        $this->hasColumn('campanha_id', 'integer', 11, array(
             'type' => 'integer',
             'length' => 11,
             ));
        $this->hasColumn('ip_viewer', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('is_processed', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 0,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}