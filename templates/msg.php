
    <div class="max-w-5xl mx-auto bg-white shadow-md p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-semibold text-gray-700">Detalle del mensaje</h1>
            <button onclick="window.history.back()" class="bg-blue-500 text-white px-4 py-2 text-sm flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>Volver
            </button>
        </div>

        <div class="border p-4 bg-gray-50 text-sm text-gray-700">
            <div class="flex justify-end space-x-2 mb-4">
                <button class="bg-white border border-gray-300 px-3 py-1 text-sm flex items-center"><i class="fas fa-reply mr-2"></i>Responder</button>
                <button class="bg-white border border-gray-300 px-3 py-1 text-sm flex items-center"><i class="fas fa-envelope-open-text mr-2"></i>Marcar como no leído</button>
                <button class="bg-white border border-gray-300 px-3 py-1 text-sm flex items-center"><i class="fas fa-trash-alt mr-2"></i>Enviar a la papelera</button>
            </div>
            <p><span class="font-semibold">Asunto:</span> <span class="font-bold"><?php echo $asunto; ?></span></p>
            <p><span class="font-semibold">De:</span> <i class="fas fa-user mr-1"></i> <?php echo $remitente; ?></p>
            <p><span class="font-semibold">Fecha:</span> <?php echo $fecha; ?> a las <?php echo $hora; ?></p>
            <div class="border-t mt-4 pt-4">
                <p><?php echo $mensaje; ?></p>
            </div>
        </div>
    </div>

