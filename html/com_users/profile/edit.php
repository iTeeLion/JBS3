<?php
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

$lang = JFactory::getLanguage();
$lang->load('plg_user_profile', JPATH_ADMINISTRATOR);
?>
<div class="profile-edit<?php echo $this->pageclass_sfx ?> ">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <div class="page-header">
            <h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
        </div>
    <?php endif; ?>

    <script type="text/javascript">
        Joomla.twoFactorMethodChange = function (e) {
            var selectedPane = 'com_users_twofactor_' + jQuery('#jform_twofactor_method').val();

            jQuery.each(jQuery('#com_users_twofactor_forms_container>div'), function (i, el) {
                if (el.id != selectedPane) {
                    jQuery('#' + el.id).hide(0);
                } else {
                    jQuery('#' + el.id).show(0);
                }
            });
        }
    </script>

    <form id="member-profile" action="<?php echo JRoute::_('index.php?option=com_users&task=profile.save'); ?>"
          method="post" class="form-validate form-horizontal" role="form" enctype="multipart/form-data">
        <?php foreach ($this->form->getFieldsets() as $group => $fieldset):?>
            <?php $fields = $this->form->getFieldset($group); ?>
            <?php if (count($fields)): ?>
                <div class="col-xs-12 col-sm-6" style="padding-left: 0;">
                    <fieldset>
                        <?php if (isset($fieldset->label)):?>
                            <legend><?php echo JText::_($fieldset->label); ?></legend>
                        <?php endif; ?>
                        <?php foreach ($fields as $field):?>
                            <?php if ($field->hidden):?>
                                <?php echo $field->input; ?>
                            <?php else: ?>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <?php echo $field->label; ?>
                                        <?php if (!$field->required && $field->type != 'Spacer') : ?>
                                            <span class="optional"
                                                  title="&lt;strong&gt;"><?php echo JText::_('COM_USERS_OPTIONAL'); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-sm-12">
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
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </fieldset>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php if (count($this->twofactormethods) > 1): ?>
            <fieldset>
                <legend><?php echo JText::_('COM_USERS_PROFILE_TWO_FACTOR_AUTH') ?></legend>

                <div class="form-group">
                    <div class="control-label">
                        <label id="jform_twofactor_method-lbl" for="jform_twofactor_method" class="hasTooltip"
                               title="&lt;strong&gt;<?php echo JText::_('COM_USERS_PROFILE_TWOFACTOR_LABEL') ?>&lt;/strong&gt;<br/><?php echo JText::_('COM_USERS_PROFILE_TWOFACTOR_DESC') ?>">
                            <?php echo JText::_('COM_USERS_PROFILE_TWOFACTOR_LABEL'); ?>
                        </label>
                    </div>
                    <div class="controls">
                        <?php echo JHtml::_('select.genericlist', $this->twofactormethods, 'jform[twofactor][method]', array('onchange' => 'Joomla.twoFactorMethodChange()'), 'value', 'text', $this->otpConfig->method, 'jform_twofactor_method', false) ?>
                    </div>
                </div>
                <div id="com_users_twofactor_forms_container">
                    <?php foreach ($this->twofactorform as $form): ?>
                        <?php $style = $form['method'] == $this->otpConfig->method ? 'display: block' : 'display: none'; ?>
                        <div id="com_users_twofactor_<?php echo $form['method'] ?>" style="<?php echo $style; ?>">
                            <?php echo $form['form'] ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </fieldset>

            <fieldset>
                <legend>
                    <?php echo JText::_('COM_USERS_PROFILE_OTEPS') ?>
                </legend>
                <div class="alert alert-info">
                    <?php echo JText::_('COM_USERS_PROFILE_OTEPS_DESC') ?>
                </div>
                <?php if (empty($this->otpConfig->otep)): ?>
                    <div class="alert alert-warning">
                        <?php echo JText::_('COM_USERS_PROFILE_OTEPS_WAIT_DESC') ?>
                    </div>
                <?php else: ?>
                    <?php foreach ($this->otpConfig->otep as $otep): ?>
                        <span class="col-sm-3">
			                <?php echo substr($otep, 0, 4) ?>-<?php echo substr($otep, 4, 4) ?>-
                            <?php echo substr($otep, 8, 4) ?>-<?php echo substr($otep, 12, 4) ?>
		                </span>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>
                <?php endif; ?>
            </fieldset>
        <?php endif; ?>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary validate"><span><?php echo JText::_('JSUBMIT'); ?></span>
            </button>
            <a class="btn btn-default" href="<?php echo JRoute::_(''); ?>"
               title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a>
            <input type="hidden" name="option" value="com_users"/>
            <input type="hidden" name="task" value="profile.save"/>
            <?php echo JHtml::_('form.token'); ?>
        </div>
    </form>
</div>
