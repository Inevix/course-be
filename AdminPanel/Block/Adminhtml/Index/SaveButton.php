<?php

namespace Overdose\AdminPanel\Block\Adminhtml\Index;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Overdose\AdminPanel\Block\Adminhtml\Index\GenericButton;

class SaveButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'id_hard' => 'save',
            'label' => __('Save Friend'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'overdose_friends_form.overdose_friends_form',
                                'actionName' => 'save',
                                'params' => [
                                    false
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}

