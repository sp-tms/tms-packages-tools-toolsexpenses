<?php

namespace Apps\Tms\Packages\Tools\Expenses;

use System\Base\BasePackage;

class ToolsExpenses extends BasePackage
{
    //protected $modelToUse = ::class;

    protected $packageName = 'toolsexpenses';

    public $toolsexpenses;

    public function init()
    {
        //Note: If you want to use init function, you need to run parent::init as well.
        //It is used by the use app database feature of the app.
        //if you remove the init() function from this class, it is also fine.
        parent::init();

        return $this;
    }

    public function getToolsExpensesById($id)
    {
        $toolsexpenses = $this->getById($id);

        if ($toolsexpenses) {
            //
            $this->addResponse('Success');

            return;
        }

        $this->addResponse('Error', 1);
    }

    public function addToolsExpenses($data)
    {
        //
    }

    public function updateToolsExpenses($data)
    {
        $toolsexpenses = $this->getById($id);

        if ($toolsexpenses) {
            //
            $this->addResponse('Success');

            return;
        }

        $this->addResponse('Error', 1);
    }

    public function removeToolsExpenses($data)
    {
        $toolsexpenses = $this->getById($id);

        if ($toolsexpenses) {
            //
            $this->addResponse('Success');

            return;
        }

        $this->addResponse('Error', 1);
    }
}