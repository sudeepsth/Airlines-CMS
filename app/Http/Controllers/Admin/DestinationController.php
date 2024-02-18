<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;
use Illuminate\Database\DatabaseManager;
use App\Http\Controllers\Controller;
use App\Models\Admin\Destination;
use App\Http\Requests\Admin\DestinationRequest;

class DestinationController extends Controller
{
     /**
     * @var LoggerInterface
     */
    private $log;

     /**
     * @var DatabaseManager
     */
    private $db;

     /**
     * @var Destination
     */
    private $destination;

     /**
     * DestinationController constructor.
     * @param Destination $destination
     */

    public function __construct(LoggerInterface $log, DatabaseManager $db, Destination $destination)
    {
        $this->db = $db;
        $this->log = $log;
        $this->destination = $destination;
    }

    public function index()
    {
        $destinations = $this->destination->orderby('created_at','DESC')->where('status',1)->paginate(50);
        return view('admin.destination.index',compact('destinations'));
    }

    public function create()
    {
        return view('admin.destination.create');
    }

    public function store(DestinationRequest $request)
    {
        try{
            $this->db->beginTransaction();
            $input = $request->only(['destination']);
            $this->destination->create($input);
            $this->db->commit();

            return redirect()->route('destination.index')->with('success','Destination added successfully');

        } catch(\Exception $e)
        {
            $this->db->rollBack();
            $this->log->error((string)$e);
            return back()->with('error', 'There was an error creating destination.');
        }
    }

    public function edit($id)
    {
        $destination = $this->destination->find($id);
        return view('admin.destination.edit',compact('destination'));
    }

    public function update(DestinationRequest $request, $id)
    {
        try{
            $this->db->beginTransaction();
            $input = $request->only(['destination']);
            $this->destination->find($id)->update($input);
            $this->db->commit();

            return redirect()->route('destination.index')->with('success','Destination updated successfully');

        } catch(\Exception $e)
        {
            $this->db->rollBack();
            $this->log->error((string)$e);
            return back()->with('error', 'There was an error updating destination.');
        }
    }

    public function destroy($id)
    {
        try{

            $this->destination->destroy($id);
            return redirect()->route('destination.index')->with('success','Destination deleted successfully');

        }catch(\Exception $e){
            $this->log->error((string)$e);
            return back()->with('error', 'There was an error deleting destination.');
        }

    }
}
