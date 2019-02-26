<?php
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');
?>
<div class="reset-confirm<?php echo $this->pageclass_sfx ?> well-lg bg-white">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1>
            <?php echo $this->escape($this->params->get('page_heading')); ?>
        </h1>
    <?php endif; ?>

    <form action="<?php echo JRoute::_('index.php?option=com_users&task=reset.confirm'); ?>" method="post"
          class="form-validate form-horizontal">
        <?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
            <fieldset>
                <p class="alert alert-info">
                    <span class="fa fa-info-circle"></span>
                    <?php echo JText::_($fieldset->label); ?>
                </p>
                <?php foreach ($this->form->getFieldset($fieldset->name) as $name => $field) : ?>
                    <div class="form-group">
                        <div class="control-label col-sm-2">
                            <?php echo $field->label; ?>
                        </div>
                        <div class="col-sm-10">
                            <?php
                            $required = '';
                            if ($field->required) {
                                $required = 'required';
                            }
                            ?>
                            <?php $field->__set('class', $field->getAttribute('class') . " form-control $required"); ?>
                            <?php echo $field->input; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </fieldset>
        <?php endforeach; ?>
        <div class="col-sm-offset-2">
            <button type="submit" class="validate btn btn-primary"><?php echo JText::_('JSUBMIT'); ?></button>
            <?php echo JHtml::_('form.token'); ?>
        </div>
    </form>
</div>
