<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;

class ViewUserByUsernameAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
	    $request = $this->request;
	    $params = $request->getUri();
	    var_dump("here");
	    var_dump($params);
	    echo($params);
	    echo $params;
	    $username = (string) $this->resolveArg('username');
        $user = $this->userRepository->findUserByUsername($username);

        $this->logger->info("User of id `${$username}` was viewed.");

        return $this->respondWithData($user);
    }
}
