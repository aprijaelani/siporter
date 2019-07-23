	@extends('layouts.app')
	@section('css')
	  <!-- fullCalendar -->
  <link rel="stylesheet" href="{{asset('bower_components/fullcalendar/dist/fullcalendar.min.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/fullcalendar/dist/fullcalendar.print.min.css')}}" media="print">
	@endsection
	@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Calendar
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Calendar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Draggable Events</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-events">
                <div class="external-event bg-green">Lunch</div>
                <div class="external-event bg-yellow">Go home</div>
                <div class="external-event bg-aqua">Do homework</div>
                <div class="external-event bg-light-blue">Work on UI design</div>
                <div class="external-event bg-red">Sleep tight</div>
                <div class="checkbox">
                  <label for="drop-remove">
                    <input type="checkbox" id="drop-remove">
                    remove after drop
                  </label>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Create Event</h3>
            </div>
            <div class="box-body">
              <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                <ul class="fc-color-picker" id="color-chooser">
                  <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                </ul>
              </div>
              <!-- /btn-group -->
              <div class="input-group">
                <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                <div class="input-group-btn">
                  <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Add</button>
                </div>
                <!-- /btn-group -->
              </div>
              <!-- /input-group -->
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
	@endsection
	@section('javascript')
	<script src="{{asset('bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
	<script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{asset('bower_components/moment/moment.js')}}"></script>

	<script type="text/javascript">
		$(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function init_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    init_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
      events    : [
        {
          title          : 'All Day Event',
          start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954' //red
        },
        {
          title          : 'Long Event',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
        {
          title          : 'Meeting',
          start          : new Date(y, m, d, 10, 30),
          allDay         : false,
          backgroundColor: '#0073b7', //Blue
          borderColor    : '#0073b7' //Blue
        },
        {
          title          : 'Lunch',
          start          : new Date(y, m, d, 12, 0),
          end            : new Date(y, m, d, 14, 0),
          allDay         : false,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor    : '#00c0ef' //Info (aqua)
        },
        {
          title          : 'Birthday Party',
          start          : new Date(y, m, d + 1, 19, 0),
          end            : new Date(y, m, d + 1, 22, 30),
          allDay         : false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor    : '#00a65a' //Success (green)
        },
        {
          title          : 'Click for Google',
          start          : new Date(y, m, 28),
          end            : new Date(y, m, 29),
          url            : 'http://google.com/',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        }
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      init_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })

		function Edit_Button_Periksa_Ulang(e, event_id){
			$('.edit-modal-periksa').modal('show');
			e.stopPropagation();

			$.ajax({
				url: "/tb02/get-data-periksa", 
				type: "GET",
				data: {"id" : event_id},
				success: function(response){
					console.log(response);
					$('#ids_edit').val(response.id);
					$('#pasien_ids_edit').val(response.pasien_id);
					$('#faskes_ids_edit').val(response.faskes_id);
					$('#tanggal_janji_edit').val(response.tanggal_janji);
					$('#bulan_ke_edit').val(response.bulan_ke);
					$('#status_janji_edit').val(response.status_janji);
				}

			});

		}

		$("#btnEditPeriksa").click(function() {

		    $.ajax({
		      type: 'post',
		      url: '/tb02/update-periksa',
		      data: {
		        '_token': $('input[name=_token]').val(),
		        'id': $('input[name=ids_edit]').val(),
		        'pasien_id': $('select[name=pasien_ids_edit]').val(),
		        'faskes_id': $('select[name=faskes_ids_edit]').val(),
		        'tanggal_janji': $('input[name=tanggal_janji_edit]').val(),
		        'bulan_ke': $('input[name=bulan_ke_edit]').val(),
		        'status_janji': $('input[name=status_janji_edit]').val(),
		      },
		      success: function(data) {
		      	// console.log(data);
		          $('.edit-modal-periksa').modal('hide');
					  swal({type: 'success',title: 'Data Periksa Ulang Berhasil Diupdate',showConfirmButton: false})
			              window.location.href = "/tb02"
		      },
		    });
		  });


		$("#btnUpdateJadwal").click(function() {
		    $.ajax({
		      type: 'post',
		      url: '/tb02/update',
		      data: {
		        '_token': $('input[name=_token]').val(),
		        'id': $('input[name=id_edit]').val(),
		        'pasien_id': $('select[name=pasien_id_edit]').val(),
		        'faskes_id': $('select[name=faskes_id_edit]').val(),
		        'tanggal': $('input[name=tanggal_edit]').val(),
		        'tahap_pengobatan': $('input[name=tahap_pengobatan_edit]').val(),
		        'jumlah_obat': $('input[name=jumlah_obat_edit]').val(),
		        'tanggal_harus_kembali': $('input[name=tanggal_harus_kembali_edit]').val(),
		        'status_kembali': $('input[name=status_kembali_edit]').val(),

		      },
		      success: function(data) {
		      	console.log(data)
		        $('.create-modal-jadwal-edit').modal('hide');
				  swal({type: 'success',title: 'Data Jadwal Berhasil Diupdate',showConfirmButton: false})
		              window.location.href = "/tb02"
		      },
		    });
		  });

		$("#delete").click(function() {
		    $.ajax({
		      type: 'post',
		      url: '/tb02/delete',
		      data: {
		        '_token': $('input[name=_token]').val(),
		        'id' : $('input[name=id-delete]').val()
		      },
		      success: function(data) {
		      	$('.item' + data.id).remove();
		        swal({type: 'success',title: 'Data Jadwal Berhasil Diupdate',showConfirmButton: false})
		        location.href = "/tb02"
		      }
		    });
		  });

		function Edit_Button_Jadwal_Perjanjian(e, event_id){
			$('.create-modal-jadwal-edit').modal('show');
			e.stopPropagation();

			$.ajax({
				url: "/tb02/get-data-jadwal", 
				type: "GET",
				data: {"id" : event_id},
				success: function(response){
					console.log(response);
					$('#id_edit').val(response.id);
					$('#faskes_id_edit').val(response.faskes_id);
					$('#pasien_id_edit').val(response.pasien_id);
					$('#tanggal_edit').val(response.tanggal);
					$('#tahap_pengobatan_edit').val(response.tahap_pengobatan);
					$('#jumlah_obat_edit').val(response.jumlah_obat);
					$('#tanggal_harus_kembali_edit').val(response.tanggal_harus_kembali);
					$('#status_kembali_edit').val(response.status_kembali);
				}

			});

		}

		$('.select2').select2();

		$(document).ready(function() {
		    $('#example1').DataTable( { 
		    });
		
		});
	    $('.datepicker').datepicker({
	      autoclose: true
	    })
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
	    $('#example2').DataTable( {
	        
	    } );
	} );
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
	    $('#example3').DataTable( {
	        
	    } );
	} );
	</script>
	@endsection