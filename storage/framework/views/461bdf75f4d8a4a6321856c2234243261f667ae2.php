<?php $__env->startSection('title'); ?>
    Gestion Des Réservations | La Roulotte De Charme
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('manage_bookings')); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('left-content'); ?>
    <?php echo $__env->make('inc.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('right-content'); ?>
    <h4 class="mb-4">Gestion des réservations</h4>
    <P></P>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.1/fullcalendar.min.js"></script>
        <script>

            $(document).ready(function() {
                $('#success').hide();
                var calendar = $('#calendar').fullCalendar({
                    locale : 'fr',
                    events: '/reservations',
                    selectable: true,
                    displayEventTime : false,
                    selectHelper: true,
                    eventRender: function(event, element) {
                        element.find('.fc-title').html('Client :'+ event.name);
                    },
                    eventClick: function (event) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },

                            url: '/administration/reservations/' + event.id,

                            type: "GET",

                            success:function(data){
                                if(data && data.length) {
                                    var date_debut = $('#date_debut');
                                    var date_fin = $('#date_fin');
                                    var nom = $('#nom');
                                    var title = $('#modalTitle');
                                    var email = $('#email');
                                    var commentaire = $('#commentaire');
                                    for (var i = 0; i < data.length; i++) {
                                        title.html('Reservation numero #' + data[i].id)
                                        date_debut.val(data[i].date_debut)
                                        date_fin.val(data[i].date_fin)
                                        nom.val(data[i].nom)
                                        email.val(data[i].email)
                                        commentaire.html(data[i].commentaire)



                                    }
                                }}

                        });

                        $('#calendarModal').modal('show');

                        $('#supprimer').click(function () {
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: '/administration/reservations/' + event.id + '/delete',
                                type: 'GET',
                                success: $('#calendarModal').modal('hide')
                                + $('#success').show('2000').html('<p>Supprimé avec succés!</p>')
                                + $('#success').delay('3000').fadeOut('slow')
                        })
                        });
                        }


                });
                $('#addreservation').click(function () {
                    $('#calendarForm').modal('show');
                });


            });


        </script>
    </head>
        <button type="submit" class="btn btn-sm btn-primary mb-3" id="addreservation">Ajouter une réservation</button>
        <div class="alert alert-success" id="success">
        </div>
        <div id="calendar"></div>
        <div id="calendarModal" class="modal fade" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="modalTitle" class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>

                    </div>
                    <div id="modalBody" class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label col-form-label">Date de début</label>
                        <input type="date" class="form-control form-control-sm" id="date_debut" name="date_debut">
                    </div>
                        <div class="form-group">
                            <label class="col-form-label col-form-label">Date de fin</label>
                            <input type="date" class="form-control form-control-sm" value="" id="date_fin">
                        </div>
                        <div class="form-group">
                        <label class="col-form-label col-form-label">Nom</label>
                        <input type="text" class="form-control form-control-sm" value="" id="nom">
                    </div>
                        <div class="form-group">
                            <label class="col-form-label col-form-label">Email</label>
                            <input type="text" class="form-control form-control-sm" value="" id="email">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm">Commentaire</label>
                            <textarea class="form-control form-control-sm" id="commentaire"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="supprimer">Supprimer</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="calendarForm" class="modal fade" aria-hidden="true">
            <form method="post">
                <?php echo csrf_field(); ?>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="modalTitle" class="modal-title">Ajouter une reservation</h5>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>

                    </div>
                    <div id="modalBody" class="modal-body">
                        <div class="form-group">
                            <label class="col-form-label col-form-label">Date de début <span class="red">*</span> </label>
                            <input type="date" class="form-control form-control-sm <?php $__errorArgs = ['date_debut'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is is-invalid <?php endif; ?>" id="date_debut" name="date_debut" value="<?php echo e(old('date_debut')); ?>" required>
                            <?php $__errorArgs = ['date_debut'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label col-form-label">Date de fin <span class="red">*</span> </label>
                            <input type="date" class="form-control form-control-sm <?php $__errorArgs = ['date_fin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is is-invalid <?php endif; ?>" value="<?php echo e(old('date_fin')); ?>" name="date_fin" id="date_fin" required>
                            <?php $__errorArgs = ['date_fin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label col-form-label">Nom</label>
                            <input type="text" class="form-control form-control-sm <?php $__errorArgs = ['nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is is-invalid <?php endif; ?>" name="nom" value="" id="nom">
                            <?php $__errorArgs = ['nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label col-form-label">Email</label>
                            <input type="text" class="form-control form-control-sm" value="" id="email">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm">Commentaire</label>
                            <textarea class="form-control form-control-sm" id="commentaire"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm">Nombre de personnes</label>
                            <select class="custom-select custom-select-sm" name="nombre_personnes">
                                <option value="1">1</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    <?php if(Session::has('errors')): ?>
        <script>
            $(document).ready(function(){
               $('#calendarForm').modal('show');
            });
        </script>
    <?php endif; ?>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alpha02/Location/resources/views/admin/reservation/index.blade.php ENDPATH**/ ?>