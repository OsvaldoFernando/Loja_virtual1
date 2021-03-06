<?php

$this->load->view('restrita/layout/navbar');

$this->load->view('restrita/layout/sidebar');

?>


<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-body">
			<!-- add content here -->

			<div class="row">
				<form class="col-12">
					<div class="card">
						<div class="card-header">
							<h4><?php echo $titulo; ?></h4>
						</div>

						<?php

						//Criando atributo segundo a documentação

						$atributos = array(
								'name' => 'form_core',
						);


						if (isset($usuario)) {
							//Crie uma variável e atribua o atributo do objeto usuário: Atributo($usuario) objecto usuário(id)
							$usuario_id = $usuario->id;
						} else {
							$usuario_id = '';
						}

						?>

						<!-- Abertura do formulário através do CI -->

						<?php echo form_open('restrita/usuarios/core/' . $usuario_id, $atributos); ?>

						<div class="card-body">

							<!-- View Responsãvel por editar e cadastrar USUÁRIO-->

							<!-- Trazendo o debug de volta para copiar os campos do banco de dado-->
							<div class="form-row">
								<div class="form-group col-md-4">
									<label>Nome</label>
									<input type="text" name="first_name" class="form-control"
										   value="<?php echo(isset($usuario) ? $usuario->first_name : ''); ?>">
								</div>

								<div class="form-group col-md-4">
									<label>Sobre nome</label>
									<input type="text" name="last_name" class="form-control"
										   value="<?php echo(isset($usuario) ? $usuario->last_name : ''); ?>">
								</div>

								<div class="form-group col-md-4">
									<label>Email</label>
									<input type="email" name="email" class="form-control"
										   value="<?php echo(isset($usuario) ? $usuario->email : ''); ?>">
								</div>

							</div>

							<div class="form-row">
								<div class="form-group col-md-4">
									<label>Usuário</label>
									<input type="text" name="username" class="form-control"
										   value="<?php echo(isset($usuario) ? $usuario->username : ''); ?>">
								</div>

								<div class="form-group col-md-4">
									<label>Senha</label>
									<input type="password" name="password" class="form-control">
								</div>

								<div class="form-group col-md-4">
									<label>Confirma</label>
									<input type="password" name="confirma" class="form-control">
								</div>

							</div>

							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="inputState">Ativo</label>
									<select id="inputState" class="form-control" name="active">

										<?php if (isset($usuario)): ?>

											<option value="1" <?php echo($usuario->active == 1 ? 'selected' : ''); ?>>
												Sim
											</option>
											<option value="0" <?php echo($usuario->active == 0 ? 'selected' : ''); ?>>
												Não
											</option>

										<?php else: ?>

											<option value="1">Sim</option>
											<option value="0">Não</option>

										<?php endif; ?>


									</select>
								</div>

								<div class="form-group col-md-4">
									<label for="inputState">Perfil de acesso</label>
									<select id="inputState" class="form-control" name="perfil">

										<?php foreach ($grupos as $grupo): ?>

											<?php if (isset($usuario)): ?>

												<option value="<?php echo $grupo->id; ?>" <?php echo($grupo->id == $perfil->id ? 'selected' : ''); ?>><?php echo $grupo->name; ?></option>

											<?php else: ?>

												<option value="<?php echo $grupo->id; ?>"><?php echo $grupo->name; ?></option>

											<?php endif; ?>


										<?php endforeach; ?>

									</select>
								</div>

								<?php if (isset($usuario)): ?>
									<input type="hidden" name="usuario_id" value="<?php echo $usuario->id; ?>">
								<?php endif; ?>

							</div>


						</div>
						<div class="card-footer">
							<button class="btn btn-primary mr-2">Enviar</button>
							<a class="btn btn-dark" href="<?php echo base_url('restrita/usuarios'); ?>">Voltar</a>
						</div>

						<?php echo form_close(); ?>

					</div>
					<!--				</form>-->
					<!--Fim, View Responsãvel por editar e cadastrar USUÁRIO-->
			</div>
		</div>
</div>

</section>


<?php
$this->load->view('restrita/layout/sidebar_settings');; ?>

</div>



