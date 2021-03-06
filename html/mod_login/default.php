<?php
defined('_JEXEC') or die;

require_once JPATH_SITE . '/components/com_users/helpers/route.php';

JHtml::_('behavior.keepalive');
JHtml::_('bootstrap.tooltip');
?>
<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form"
      class="">
    <?php if ($params->get('pretext')) : ?>
        <div class="pretext">
            <p><?php echo $params->get('pretext'); ?></p>
        </div>
    <?php endif; ?>
    <div class="userdata">
        <div id="form-login-username" class="form-group">

            <?php if (!$params->get('usetext')) : ?>
                <span class="fa fa-user hasTooltip" title="<?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?>"></span>
                <label for="modlgn-username"
                       class="element-invisible"><?php echo JText::_('MOD_LOGIN_VALUE_USERNAME'); ?></label>
                <input id="modlgn-username" type="text" name="username" class="form-control" tabindex="0" size="18"
                       placeholder="<?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?>"/>
            <?php else: ?>
                <label for="modlgn-username"><?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?></label>
                <input id="modlgn-username" type="text" name="username" class="form-control" tabindex="0" size="18"
                       placeholder="<?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?>"/>
            <?php endif; ?>

        </div>
        <div id="form-login-password" class="form-group">

            <?php if (!$params->get('usetext')) : ?>
                <span class="fa fa-lock hasTooltip" title="<?php echo JText::_('JGLOBAL_PASSWORD') ?>"></span>
                <label for="modlgn-passwd" class="element-invisible"><?php echo JText::_('JGLOBAL_PASSWORD'); ?>
                </label>
                <input id="modlgn-passwd" type="password" name="password" class="form-control" tabindex="0" size="18"
                       placeholder="<?php echo JText::_('JGLOBAL_PASSWORD') ?>"/>
            <?php else: ?>
                <label for="modlgn-passwd"><?php echo JText::_('JGLOBAL_PASSWORD') ?></label>
                <input id="modlgn-passwd" type="password" name="password" class="form-control" tabindex="0" size="18"
                       placeholder="<?php echo JText::_('JGLOBAL_PASSWORD') ?>"/>
            <?php endif; ?>

        </div>
        <?php if (count($twofactormethods) > 1): ?>
            <div id="form-login-secretkey" class="form-group">
                <div class="controls">
                    <?php if (!$params->get('usetext')) : ?>
                        <div class="input-prepend input-append">
                            <span class="add-on">
                                <span class="fa fa-star hasTooltip"
                                      title="<?php echo JText::_('JGLOBAL_SECRETKEY'); ?>">
                                </span>
                                <label for="modlgn-secretkey" class="element-invisible">
                                    <?php echo JText::_('JGLOBAL_SECRETKEY'); ?>
                                </label>
                            </span>
                            <input id="modlgn-secretkey" autocomplete="off" type="text" name="secretkey"
                                   class="form-control" tabindex="0" size="18"
                                   placeholder="<?php echo JText::_('JGLOBAL_SECRETKEY') ?>"/>
                            <span class="btn width-auto hasTooltip"
                                  title="<?php echo JText::_('JGLOBAL_SECRETKEY_HELP'); ?>">
                                <span class="fa fa-help"></span>
                            </span>
                        </div>
                    <?php else: ?>
                        <label for="modlgn-secretkey"><?php echo JText::_('JGLOBAL_SECRETKEY') ?></label>
                        <input id="modlgn-secretkey" autocomplete="off" type="text" name="secretkey"
                               class="form-control" tabindex="0" size="18"
                               placeholder="<?php echo JText::_('JGLOBAL_SECRETKEY') ?>"/>
                        <span class="btn width-auto hasTooltip"
                              title="<?php echo JText::_('JGLOBAL_SECRETKEY_HELP'); ?>">
									<span class="fa fa-help"></span>
								</span>
                    <?php endif; ?>

                </div>
            </div>
        <?php endif; ?>
        <?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
            <div id="form-login-remember" class="form-group checkbox">
                <label for="modlgn-remember"><input id="modlgn-remember" type="checkbox" name="remember"
                                                    class="inputbox"
                                                    value="yes"/><?php echo JText::_('MOD_LOGIN_REMEMBER_ME') ?>
                </label>
            </div>
        <?php endif; ?>
        <div id="form-login-submit" class="form-group">
            <button type="submit" tabindex="0" name="Submit" class="btn btn-default btn-primary">
                <?php echo JText::_('JLOGIN') ?>
            </button>
        </div>
        <?php $usersConfig = JComponentHelper::getParams('com_users'); ?>
        <ul class="list-unstyled">
            <?php if ($usersConfig->get('allowUserRegistration')) : ?>
                <li>
                    <a href="<?php echo JRoute::_('index.php?option=com_users&view=registration&Itemid=' . UsersHelperRoute::getRegistrationRoute()); ?>">
                        <?php echo JText::_('MOD_LOGIN_REGISTER'); ?>
                        <span class="fa fa-arrow-right"></span>
                    </a>
                </li>
            <?php endif; ?>
            <li>
                <a href="<?php echo JRoute::_('index.php?option=com_users&view=remind&Itemid=' . UsersHelperRoute::getRemindRoute()); ?>">
                    <?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_USERNAME'); ?>
                </a>
            </li>
            <li>
                <a href="<?php echo JRoute::_('index.php?option=com_users&view=reset&Itemid=' . UsersHelperRoute::getResetRoute()); ?>">
                    <?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_PASSWORD'); ?>
                </a>
            </li>
        </ul>
        <input type="hidden" name="option" value="com_users"/>
        <input type="hidden" name="task" value="user.login"/>
        <input type="hidden" name="return" value="<?php echo $return; ?>"/>
        <?php echo JHtml::_('form.token'); ?>
    </div>
    <?php if ($params->get('posttext')) : ?>
        <div class="posttext">
            <p><?php echo $params->get('posttext'); ?></p>
        </div>
    <?php endif; ?>
</form>
