<?php

namespace Erp\Bundle\SystemBundle\Authorization;

class SystemAccountAuthorization extends AbstractSystemAccountAuthorization
{
    use \Erp\Bundle\CoreBundle\Authorization\ErpReadonlyAuthorizationTrait;
}
