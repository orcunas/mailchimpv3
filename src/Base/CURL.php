<?php
/**
 * @author Orcun As <orcun@wiggledigital.com>
 * @company Wiggle Digital
 * @since 05/10/16 01:01
 */

namespace WiggleDigital\MailChimp\Base;

class CURL {

    private $_options;

    public function getOptions()
    {
        return $this->_options;
    }

    public function setOptions($curlOptions)
    {
        $this->_options = $curlOptions;
    }

    public function request()
    {
        $ch = curl_init();

        curl_setopt_array($ch, $this->_options);

        try {
            $result = curl_exec($ch);

            curl_close($ch);

            return $result;
        } catch (\Exception $e) {
            curl_close($ch);
            echo $e->getMessage();
        }
    }

}