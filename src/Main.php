<?php

namespace Reactmore\OY;

use Dotenv\Dotenv;
use Reactmore\OY\API\AccountInquiry\AccountInquiry;
use Reactmore\OY\Helpers\FileHelper;
use Reactmore\OY\Helpers\Validations\MainValidator;


class Main
{

    const DOT_ENV = '.env';

    private $credential, $stage;

    public function __construct(array $data = [])
    {
        MainValidator::validateCredentialRequest($data);
        $this->setEnvironmentFile();
        $this->setCredential($data);
    }

    private function setEnvironmentFile()
    {
        $envDirectory = FileHelper::getAbsolutePathOfAncestorFile(self::DOT_ENV);

        if (file_exists($envDirectory . '/' . self::DOT_ENV)) {
            $dotEnv = Dotenv::createMutable(FileHelper::getAbsolutePathOfAncestorFile(self::DOT_ENV));
            $dotEnv->load();
        }
    }

    private function setCredential($data)
    {

        if (empty($data['stage'])) {
            $this->stage = isset($_ENV['API_STAGE']) ? $_ENV['API_STAGE'] : 'SANDBOX';
        } else {
            $this->stage = $data['stage'];
        }

        $this->stage = strtoupper($this->stage) == 'PRODUCTION' ? 'PRODUCTION' : 'SANDBOX';

        if (empty($data['username'])) {
            $this->credential['username'] = isset($_ENV['USERNAME']) ? $_ENV['USERNAME'] : '';
        } else {
            $this->credential['username'] = $data['username'];
        }

        if (empty($data['apikey'])) {
            $this->credential['apikey'] = isset($_ENV['APIKEY_' . $this->stage]) ? $_ENV['APIKEY_' . $this->stage] : '';
        } else {
            $this->credential['apikey'] = $data['apikey'];
        }
    }

    public function AccountInquiry()
    {
        return new AccountInquiry($this->credential, $this->stage);
    }
}
