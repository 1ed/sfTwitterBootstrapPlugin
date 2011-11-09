<?php

/**
 * Default formatter class for forms
 */
class sfWidgetFormSchemaFormatterTwitterBootstrap extends sfWidgetFormSchemaFormatter
{
    protected
    $rowFormat       = "<li><div class= \"clearfix\">\n  %error%%label%\n  <div class=\"input\">%field%%help%\n%hidden_fields%</div></div></li>\n",
    $errorRowFormat  = "<div class=\"alert-message error\">\n%errors%</div>\n",
    $errorListFormatInARow     = "  <div class=\"alert-message error\">\n%errors% </div>\n",
    $errorRowFormatInARow      = "    <p>%error%</p>\n",
    $helpFormat      = '<span class="help-block">%help%</span>',
    $decoratorFormat = "<ul class=\"man\">\n  %content%</ul>";

    protected $validatorSchema;

    /**
     * Generates a label for the given field name.
     *
     * @param  string $name        The field name
     * @param  array  $attributes  Optional html attributes for the label tag
     *
     * @return string The label tag
     */
    public function generateLabel($name, $attributes = array())
    {
        $labelName = $this->generateLabelName($name);

        if (false === $labelName)
        {
            return '';
        }

        if (!isset($attributes['for']))
        {
            $attributes['for'] = $this->widgetSchema->generateId($this->widgetSchema->generateName($name));
        }

        if ($this->validatorSchema) {
            $fields = $this->validatorSchema->getFields();
            if($fields[$name] != null) {
                $field = $fields[$name];
                if($field->hasOption('required') && $field->getOption('required')) {
                    $attributes['class'] = isset($attributes['class']) ? $attributes['class'] : '';
                    $attributes['class'] .= 'input-obligation';
                }
            }
        }

        return $this->widgetSchema->renderContentTag('label', $labelName, $attributes);
    }

    public function setValidatorSchema(sfValidatorSchema $validatorSchema)
    {
        $this->validatorSchema = $validatorSchema;
    }
}