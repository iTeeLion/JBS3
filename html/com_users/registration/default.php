<?php
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');
?>
<div class="registration<?php echo $this->pageclass_sfx ?> ">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <div class="page-header">
            <h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
        </div>
    <?php endif; ?>

    <form id="member-registration"
          action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" method="post"
          class="form-validate" enctype="multipart/form-data">
        <?php foreach ($this->form->getFieldsets() as $fieldset): ?>
            <?php $fields = $this->form->getFieldset($fieldset->name); ?>
            <?php if (count($fields)): ?>
                <fieldset>

                    <?php foreach ($fields as $field): ?>
                        <?php if ($field->hidden): ?>
                            <?php echo $field->input; ?>
                        <?php else: ?>
                            <div class="form-group">
                                <?php echo $field->label; ?>
                                <?php if (!$field->required && $field->type != 'Spacer') : ?>
                                    <span class="optional"><?php echo JText::_('COM_USERS_OPTIONAL'); ?></span>
                                <?php endif; ?>

                                <?php
                                $required = '';
                                if ($field->required) {
                                    $required = 'required';
                                }
                                ?>
                                <?php $field->__set('class', $field->getAttribute('class') . " form-control $required"); ?>
                                <?php echo $field->input; ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </fieldset>
            <?php endif; ?>
        <?php endforeach; ?>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary validate"><?php echo JText::_('JREGISTER'); ?></button>
            <a class="btn btn-default" href="<?php echo JRoute::_(''); ?>"
               title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a>
            <input type="hidden" name="option" value="com_users"/>
            <input type="hidden" name="task" value="registration.register"/>
            <?php echo JHtml::_('form.token'); ?>
        </div>
    </form>
</div>
