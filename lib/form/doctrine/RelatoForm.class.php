<?php

/**
 * Relato form.
 *
 * @package    Encurtador
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RelatoForm extends BaseRelatoForm
{
    public function configure()
    {
        unset($this['updated_at'], $this['created_at']);

        $this->widgetSchema['imagem'] = new sfWidgetFormInputFileEditable(array(
            'file_src' => '/uploads/' . $this->getObject()->getImagem(),
            'with_delete' => false,
            'edit_mode' => strlen($this->getObject()->getImagem()),
            'template' => '<div>%input%<br /><br /><a href="%file%" target="_blank">Visualizar arquivo</a></div>',
        ));

        $this->validatorSchema['imagem'] = new sfValidatorFile(array(
            'required' => false,
            'mime_types' => array('image/gif', 'image/jpeg', 'image/png'),
            'path' => sfConfig::get('sf_upload_dir'),
        ));
    }

    public function save($con = NULL){
        parent::save($con);

        if($this->getObject()->getImagem()){
            $thumbnail = new sfThumbnail(140, 100);
            $thumbnail->loadFile(sfConfig::get('sf_upload_dir') . '/' . $this->getObject()->getImagem());
            $thumbnail->save(sfConfig::get('sf_upload_dir') . '/' . $this->getObject()->getImagem());
        }
    }
}
