<?php
/**
 * @package Egosms
 */

namespace Inc\Pages;

use \Inc\Api\SettingsApi;

use \Inc\Api\Callbacks\AdminCallbacks;

class Admin
{

    public $settings;

    public $callbacks;

    public $pages = array();

    public $subpages = array();

    public function register()
    {

//        add_action('admin_menu', array($this, 'add_menu_pages'));
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubpages();

        $this->setSettings();

        $this->setSections();

        $this->setFields();

        $this->settings->withSubPage('Dashboard')->addSubPages($this->subpages)->addPages($this->pages)->register();
    }

    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'Egosms',
                'menu_title' => 'Egosms',
                'capability' => 'manage_options',
                'menu_slug' => 'egosms',
                'callback' => array($this->callbacks,'adminDashboard'),
                'icon_url' => PLUGIN_URL . '/assets/img/icon.png',
                'position' => 110
            )
        );
    }

    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'egosms',
                'page_title' => 'Messages',
                'menu_title' => 'Messages',
                'capability' => 'manage_options',
                'menu_slug' => 'egosms_messages',
                'callback' => array($this->callbacks,'messageDashboard'),
            ),
            array(
                'parent_slug' => 'egosms',
                'page_title' => 'Permissions',
                'menu_title' => 'Permissions',
                'capability' => 'manage_options',
                'menu_slug' => 'egosms_permissions',
                'callback' => function () {
                    echo "<h1>Permissions</h1>";
                },
            )
        );
    }

    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'egosms_send_message_group',
                'option_name' => 'egosms_send_message',
                'callback' => ''
            )
        );

        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = array(
            array(
                'id' => 'egosms_userdata_section',
                'title' => 'User Data',
                'callback' => '',
                'page' => "egosms"
            ),
            array(
                'id' => 'egosms_msgdata_section',
                'title' => 'Message Data',
                'callback' => '',
                'page' => "egosms"
            )
        );

        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = array(
            array(
                'id' => 'egosmsUsername',
                'title' => 'User Name',
                'callback' => array($this->callbacks,'egosmsUsername'),
                'page' => "egosms",
                'section' => 'egosms_userdata_section',
                'args' => array(
                    'label_for' => 'Username',
                    'class' => 'example_class'
                )
            ),
            array(
                'id' => 'egosmsPassword',
                'title' => 'Password',
                'callback' => array($this->callbacks,'egosmsPassword'),
                'page' => "egosms",
                'section' => 'egosms_userdata_section',
                'args' => array(
                    'label_for' => 'Password',
                    'class' => 'example_class'
                )
            ),
            array(
                'id' => 'egosmsNumber',
                'title' => 'Number',
                'callback' => array($this->callbacks,'egosmsNumber'),
                'page' => "egosms",
                'section' => 'egosms_msgdata_section',
                'args' => array(
                    'label_for' => 'Number',
                    'class' => 'example_class'
                )
            ),
            array(
                'id' => 'egosmsSender',
                'title' => 'Sender ID',
                'callback' => array($this->callbacks,'egosmsSender'),
                'page' => "egosms",
                'section' => 'egosms_msgdata_section',
                'args' => array(
                    'label_for' => 'Sender ID',
                    'class' => 'example_class'
                )
            ),
            array(
                'id' => 'egosmsMessage',
                'title' => 'Message',
                'callback' => array($this->callbacks,'egosmsMessage'),
                'page' => "egosms",
                'section' => 'egosms_msgdata_section',
                'args' => array(
                    'label_for' => 'Message',
                    'class' => 'example_class'
                )
            )
        );

        $this->settings->setFields($args);
    }
}
