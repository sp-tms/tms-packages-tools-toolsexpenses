<?php

namespace Apps\Tms\Packages\Tools\Expenses;

use Apps\Tms\Packages\Tools\Expenses\Model\AppsTmsToolsExpenses;
use System\Base\BasePackage;

class ToolsExpenses extends BasePackage
{
    protected $modelToUse = AppsTmsToolsExpenses::class;

    protected $packageName = 'toolsexpenses';

    public $toolsexpenses;

    public function init()
    {
        parent::init();

        return $this;
    }

    public function getExpenseByName($expenseName)
    {
        if ($this->config->databasetype === 'db') {
            $params =
                [
                    'conditions'    => 'name = :name:',
                    'bind'          =>
                        [
                            'name'          => $expenseName,
                        ]
                ];
        } else {
            $params = ['conditions' => ['name', '=', $expenseName]];
        }

        $expenseArr = $this->getByParams($params);

        if ($expenseArr && count($expenseArr) > 0) {
            return $expenseArr[0];
        }

        return false;
    }

    public function addExpense($data)
    {
        if ($this->add($data)) {
            $this->addResponse('Expense added');

            return true;
        }

        $this->addResponse('Error Adding expense', 1);
    }

    public function updateExpense($data)
    {
        if ($this->update($data)) {
            $this->addResponse('Expense updated');

            return true;
        }

        $this->addResponse('Error Updating expense', 1);
    }

    public function removeExpense($data)
    {
        if ($this->remove($data['id'])) {
            $this->addResponse('Expense removed');

            return true;
        }

        $this->addResponse('Error removing expense', 1);

        return false;
    }

    public function getExpenseTypes()
    {
        return
            [
                '0' =>
                    [
                        'id' => '0',
                        'name'  => 'Advance'
                    ],
                '1' =>
                    [
                        'id' => '1',
                        'name'  => 'Reimburse'
                    ]
            ];
    }
}