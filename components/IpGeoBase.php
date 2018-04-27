<?php

namespace app\components;

class IpGeoBase
{

    /** @var array */
    private $geoPosition = [];

    /**
     * @param string $ip
     * @return string
     */
    public function getGeoPosition($ip)
    {
        if (empty($ip) || !$this->checkGeoPosition($ip)) {
            return 'Not found';
        }

        if (
            empty($this->geoPosition['city'])
            || empty($this->geoPosition['region'])
            || empty($this->geoPosition['country'])
        ) {
            return 'Not found';
        }

        return $this->geoPosition['city']
        . ', ' . $this->geoPosition['region']
        . ', ' . $this->geoPosition['country'];
    }

    /**
     * @param string $ip
     * @return boolean
     */
    private function checkGeoPosition($ip)
    {
        if (false === ($response_xml_data = file_get_contents('http://ipgeobase.ru:7020/geo?ip=' . $ip))) {
            echo "Error fetching XML\n";
        } else {
            libxml_use_internal_errors(true);
            $data = simplexml_load_string($response_xml_data);
            if (!$data) {
                return false;
            } else {
                $this->geoPosition = json_decode(json_encode($data->ip), 1);
                return true;
            }
        }
    }
}
