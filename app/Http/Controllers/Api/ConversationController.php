<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\ConversationRepository;
use App\User;
use Illuminate\Http\Request;

class ConversationController extends Controller {

    /**
     * @var ConversationRepository
     */
    private $r;

    public function __construct(ConversationRepository $r)
    {
        $this->r = $r;
    }

    public function index(Request $request)
    {
        return response()
            ->json([
                'conversations' => $this->r->getConversation($request->user()->id)
            ]);
    }

    public function show(Request $request, User $user)
    {
        $messages = $this->r->getMessagesFor($request->user()->id, $user->id)->get();
        return [
          'messages' => $messages->reverse()
        ];
    }
}
