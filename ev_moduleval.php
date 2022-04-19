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

    // public function slogan()
    // {
    //     $slogan = Db::getInstance()->getRow('SELECT * FROM plantes');

    // }

    public function getContent()
    {
        $output = null;

        if (Tools::isSubmit('submit'.$this->name)) 
        {
            $ev_moduleval = strval(Tools::getValue('slogan'));
            if (!$ev_module || empty($ev_moduleval) || !Validate::isGenericName($ev_moduleval)) 
            {
                $output .= $this->displayError( $this->l('Invalid Configuration value') );
            } else {
                Configuration::updateValue('slogan', $ev_moduleval);
                $output .= $this->displayConfirmation($this->l('Settings updated'));
            }
        }
        return $output.$this->displayForm()
    }

    // public function displayForm()
    // {

    // }

    public function hookdisplayHeader($params)
    {
        $this->slogan();

        return $this->display(__FILE__, 'displayHeader.tpl');
    }
}
?>