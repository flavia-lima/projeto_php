<?php if(!class_exists('Rain\Tpl')){exit;}?> <div style="margin-top: 100px;"></div>
 
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Autenticação</h2>
                </div>
            </div>
        </div>
    </div>
</div><br/><br/><br/>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">                
            <div class="col-md-6">

                <?php if( $error != '' ){ ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php } ?>

                <form action="/login" id="login-form-wrap" class="login text-center border border-light p-5" method="post">
                    <p class="h4 mb-4">Acessar</p>
                    <p class="form-row form-row-first">
                        <label for="login">E-mail <span class="required">*</span>
                        </label>
                        <input type="text" id="login" name="login" class="input-text form-control mb-4">
                    </p>
                    <p class="form-row form-row-last">
                        <label for="senha">Senha <span class="required">*</span>
                        </label>
                        <input type="password" id="senha" name="password" class="input-text form-control mb-4">
                    </p>
                    <div class="clear"></div>
                    <p class="form-row">
                        <!-- <input type="submit" value="Login" class="button"> -->
                        <button class="btn btn-info my-4 btn-block" value="Login" type="submit">Login</button>
                        <label class="inline" for="rememberme"><input type="checkbox" value="forever" id="rememberme" name="rememberme"> Manter conectado </label>
                    </p>
                    <p class="lost_password">
                        <a href="/forgot">Esqueceu a senha?</a>
                    </p>

                    <div class="clear"></div>
                </form>                    
            </div>
            <div class="col-md-6">
                
                <?php if( $errorRegister != '' ){ ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php } ?>

                <form id="register-form-wrap" action="/register" class="register text-center border border-light p-5" method="post">
                    <p class="h4 mb-4">Criar conta</p>
                    <p class="form-row form-row-first">
                        <label for="nome">Nome Completo <span class="required">*</span>
                        </label>
                        <input type="text" id="nome" name="name" class="input-text form-control mb-4" value="<?php echo htmlspecialchars( $registerValues["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </p>
                    <p class="form-row form-row-first">
                        <label for="email">E-mail <span class="required">*</span>
                        </label>
                        <input type="email" id="email" name="email" class="input-text form-control mb-4" value="<?php echo htmlspecialchars( $registerValues["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </p>
                    <p class="form-row form-row-first">
                        <label for="phone">Telefone
                        </label>
                        <input type="text" id="phone" name="phone" class="input-text form-control mb-4" value="<?php echo htmlspecialchars( $registerValues["phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </p>
                    <p class="form-row form-row-first">
                        <label for="senha">Senha <span class="required">*</span>
                        </label>
                        <input type="password" id="senha" name="password" class="input-text form-control mb-4">
                    </p>
                    <p class="form-row form-row-last">
                      <label for="cpf">CPF
                      </label>
                      <input type="tel" class="input-text form-control mb-4" id="cpf" name="cpf" value="<?php echo htmlspecialchars( $registerValues["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </p>
                    <div class="clear"></div>

                    <p class="form-row">
                        <!-- <input type="submit" value="Criar Conta" name="login" class="button btn btn-info my-4 btn-block"> -->
                        <button class="btn btn-info my-4 btn-block" type="submit" name="login">Cadastrar</button>
                    </p>

                    <div class="clear"></div>
                </form><br/><br/><br/>               
            </div>
        </div>
    </div>
</div>