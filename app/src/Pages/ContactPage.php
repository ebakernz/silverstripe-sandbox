<?php

namespace Skeletor\Pages;

use Page;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use Skeletor\DataObjects\FormSubmission;

class ContactPage extends Page
{
    private static $description = 'Standard page with a contact form';
    private static $icon_class = 'font-icon-p-book';
    private static $table_name = 'ContactPage';

    private static $db = [
        'Recipients' => 'Varchar(1024)',
        'SendCustomerEmail' => 'Boolean(false)',
        'SuccessMessage' => 'HTMLText'
    ];

    private static $has_many = [
        'Submissions' => FormSubmission::class
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab(
            'Root.Delivery',
            TextField::create(
                'Recipients',
                'Recipients'
            )->setDescription('Comma-separated list of email addresses to send this form to')
        );
        $fields->addFieldToTab('Root.Delivery', CheckboxField::create('SendCustomerEmail', 'Send confirmation email to customer?'));
        $fields->addFieldToTab('Root.Delivery', HTMLEditorField::create('SuccessMessage', 'Message to show after form submission'));

        $fields->addFieldToTab(
            'Root.Submissions',
            GridField::create(
                'Submissions',
                'Submissions',
                $this->Submissions(),
                GridFieldConfig_RecordEditor::create()
            )
        );

        return $fields;
    }
}
