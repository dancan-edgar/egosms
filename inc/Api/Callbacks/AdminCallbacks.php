<?php
/**
 * @package Egosms
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks
{
    public function adminDashboard()
    {
        return require_once (PLUGIN_PATH . "/templates/admin.php");
    }

    public function messageDashboard()
    {
        return require_once (PLUGIN_PATH . "/templates/messages.php");
    }

    public function egosmsUsername()
    {
        $value = esc_attr(get_option('egosms_send_message'));
        echo '<input type="text" class="regular_text"  name="egosms-username" value="' . $value . '">';
    }

    public function egosmsPassword()
    {
        $value = esc_attr(get_option('egosms_send_message'));
        echo '<input type="password" class="regular_text"  name="egosms-password" value="' . $value . '">';
    }

    public function egosmsNumber()
    {
        $value = esc_attr(get_option('egosms_send_message'));
        echo '<input type="number" class="regular_text"  name="egosms-number" value="' . $value . '">';
    }

    public function egosmsSender()
    {
        $value = esc_attr(get_option('egosms_send_message'));
        echo '<input type="text" class="regular_text"  name="egosms-sender" value="' . $value . '">';
    }

    public function egosmsMessage()
    {
        $value = esc_attr(get_option('egosms_send_message'));
        echo '<textarea type="text" class="regular_text" rows="5"  name="egosms-message" value="' . $value . '"></textarea>';
    }
}
