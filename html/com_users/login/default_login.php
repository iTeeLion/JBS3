<?php

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
?>
<div class="login<?php echo $this->pageclass_sfx ?>">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <div class="page-header">
            <h1>
                <?php echo $this->escape($this->params->get('page_heading')); ?>
            </h1>
        </div>
    <?php endif; ?>

    <?php if (($this->params->get('logindescription_show') == 1 && str_replace(' ', '', $this->params->get('login_description')) != '') || $this->params->get('login_image') != '') : ?>
        <div class="login-description">
    <?php endif; ?>

            <?php if ($this->params->get('logindescription_show') == 1) : ?>
                <?php echo $this->params->get('login_description'); ?>
            <?php endif; ?>

            <?php if (($this->params->get('login_image') != '')) : ?>
                <img src="<?php echo $this->escape($this->params->get('login_image')); ?>" class="login-image"
                     alt="<?php echo JTEXT::_('COM_USER_LOGIN_IMAGE_ALT') ?>"/>
            <?php endif; ?>

    <?php if (($this->params->get('logindescription_show') == 1 && str_replace(' ', '', $this->params->get('login_description')) != '') || $this->params->get('login_image') != '') : ?>
        </div>
    <?php endif; ?>

    <form action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post"
          class="form-validate">
        <fieldset>
            <?php foreach ($this->form->getFieldset('credentials') as $field) : ?>
                <?php if (!$field->hidden) : ?>
                    <div class="form-group">
                        <?php echo $field->label; ?>
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

            <?php if ($this->tfa): ?>
                <div class="form-group">
                    <?php echo $this->form->getField('secretkey')->label; ?>
                    <?php echo $this->form->getField('secretkey')->input; ?>
                </div>
            <?php endif; ?>

            <?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
                <div class="form-group">
                    <label>
                        <input id="remember" type="checkbox" name="remember" class="inputbox" value="yes"/>
                        <?php echo JText::_('COM_USERS_LOGIN_REMEMBER_ME') ?>
                    </label>
                </div>
            <?php endif; ?>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <?php echo JText::_('JLOGIN'); ?>
                </button>
                <a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">
                    <button type="button"
                            class="btn btn-default"><?php echo JText::_('COM_USERS_LOGIN_RESET'); ?></button>
                </a>
                <a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">
                    <button type="button"
                            class="btn btn-default"><?php echo JText::_('COM_USERS_LOGIN_REMIND'); ?></button>
                </a>
                <?php
                $usersConfig = JComponentHelper::getParams('com_users');
                if ($usersConfig->get('allowUserRegistration')) : ?>
                    <a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">
                        <button type="button"
                                class="btn btn-default"><?php echo JText::_('COM_USERS_LOGIN_REGISTER'); ?></button>
                    </a>
                <?php endif; ?>
            </div>

            <input type="hidden" name="return"
                   value="<?php echo base64_encode($this->params->get('login_redirect_url', $this->form->getValue('return'))); ?>"/>
            <?php echo JHtml::_('form.token'); ?>
        </fieldset>
    </form>
</div>