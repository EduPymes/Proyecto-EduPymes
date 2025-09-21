

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-info">
                <div class="card-header bg-info text-white text-center py-4">
                    <i class="fas fa-shopping-cart fa-3x mb-3"></i>
                    <h2 class="mb-0">Acceso Compradores</h2>
                    <p class="mb-0">Encuentra productos únicos</p>
                </div>

                <div class="card-body p-4">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if(session('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('login.comprador')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope me-1 text-info"></i>Correo Electrónico
                            </label>
                            <input id="email" type="email" 
                                   class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   name="email" value="<?php echo e(old('email')); ?>" 
                                   required autocomplete="email" autofocus
                                   placeholder="correo@ejemplo.com">

                            <?php $__errorArgs = ['email'];
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

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock me-1 text-info"></i>Contraseña
                            </label>
                            <input id="password" type="password" 
                                   class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   name="password" required autocomplete="current-password"
                                   placeholder="Ingresa tu contraseña">

                            <?php $__errorArgs = ['password'];
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

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" 
                                   id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                            <label class="form-check-label" for="remember">
                                Recordar mi sesión
                            </label>
                        </div>

                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-info btn-lg text-white">
                                <i class="fas fa-sign-in-alt me-2"></i>Ingresar a Comprar
                            </button>
                        </div>

                        <?php if(Route::has('password.request')): ?>
                            <div class="text-center">
                                <a class="text-decoration-none" href="<?php echo e(route('password.request')); ?>">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>
                        <?php endif; ?>
                    </form>

                    <hr class="my-4">

                    <div class="text-center">
                        <p class="mb-2">¿No tienes cuenta de comprador?</p>
                        <a href="<?php echo e(route('register.comprador')); ?>" class="btn btn-outline-info">
                            <i class="fas fa-user-plus me-2"></i>Crear Cuenta de Comprador
                        </a>
                    </div>

                    <div class="text-center mt-3">
                        <p class="mb-2">¿Eres vendedor?</p>
                        <a href="<?php echo e(route('login.vendedor')); ?>" class="btn btn-outline-primary">
                            <i class="fas fa-store me-2"></i>Acceso Vendedores
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => 'Login Compradores - EduPymes'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/auth/login-comprador.blade.php ENDPATH**/ ?>