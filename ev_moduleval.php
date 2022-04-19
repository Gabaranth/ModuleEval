<?php 
class ModulEval extends Module 
{
    public function __construct()
    {
        $this->name = 'slogan';
        $this->tab = 'front_office_features';
        $this->version = '0.1.0';
        $this->author = 'Manu';
        $this->displayName = 'Module pour slogan';
        $this->description = 'slogan';
        $this->bootstrap = true;
        parent::__construct()
    }

    public function install()
    {
        parent::install();
        $this->registerHook('displayHeader');
        return true;
    }

    public function slogan()
    {
        $slogan = Db::getInstance()->getRow('SELECT * FROM plantes');

    }

    public function hookdisplayHeader($params)
    {
        $this->slogan();

        return $this->display(__FILE__, 'displayHeader.tpl');
    }
}
?>