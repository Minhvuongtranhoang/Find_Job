/**
 * NotificationController handles the notification-related actions for the authenticated user.
 *
 * @package App\Http\Controllers
 */

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
  /**
   * Display a listing of the user's notifications.
   *
   * @return \Illuminate\View\View
   */
  public function index()
  {
    $notifications = auth()->user()->notifications()->latest()->paginate(10);
    return view('notifications.index', compact('notifications'));
  }

  /**
   * Mark a specific notification as read.
   *
   * @param \App\Models\Notification $notification
   * @return \Illuminate\Http\RedirectResponse
   */
  public function markAsRead(Notification $notification)
  {
    $notification->update(['is_read' => true]);
    return back();
  }

  /**
   * Mark all notifications as read for the authenticated user.
   *
   * @return \Illuminate\Http\RedirectResponse
   */
  public function markAllAsRead()
  {
    auth()->user()->notifications()->update(['is_read' => true]);
    return back();
  }
}
