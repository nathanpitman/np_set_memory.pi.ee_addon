<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
    'pi_name'           => 'Set Memory',
    'pi_version'        => '1.0',
    'pi_author'         => 'Nathan Pitman',
    'pi_author_url'     => 'http://github.com/nathanpitman',
    'pi_description'    => 'Useful when you need to increase the memory limit for a single template',
    'pi_usage'          => Np_set_memory::usage()
);

/**
 * Np_set_memory Class
 *
 * @package         ExpressionEngine
 * @category        Plugin
 * @author          Nathan Pitman
 * @copyright       Copyright (c) 2015 Nathan Pitman.
 * @link            http://github.com/nathanpitman
 */

class Np_set_memory {

    /**
     * Constructor
     *
     */
    function Np_set_memory()
    {

        if (!$limit = ee()->TMPL->fetch_param('limit')) {
            return;
        } else {
            ini_set('memory_limit', $limit.'M');
        }
    }

    /**
     * Usage
     *
     * Plugin Usage
     *
     * @access  public
     * @return  string
     */
    function usage()
    {
        ob_start();
        ?>

        {exp:np_set_memory limit="512"}

        would set the PHP memory limit for the current template to 512Mb

        <?php
        $buffer = ob_get_contents();

        ob_end_clean();

        return $buffer;
    }

}

// END CLASS

/* End of file pi.np_set_memory.php */
/* Location: ./system/expressionengine/third_party/np_set_memory/pi.np_set_memory.php */