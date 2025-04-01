
import Form from "./Form.js";
import {getElement} from "../core/index.js";
import {modal} from "./modal.js";


export default function modalsEvents(target) {
    if (!modal) return;
    switch (target.dataset.modal) {
        case 'callback':
            renderCallbackModal();
            new Form('.callback-form').init(target.dataset.project);
            break;
    }


}


function renderCallbackModal() {
    getElement('.modal__content .wrapper').innerHTML = `
                
                <div class="md:flex text-center md:text-left items-center mb-32 pb-16 md:pb-24 border-white gap-x-24 border-b border-solid text-white">
                    <h3 class="max-w-[4.65rem] mb-12 md:mb-0">Почніть будувати свою мрію разом із Status House</h3>
                    <div class="text-m md:text-l">Залиште свої контактні дані і наші менеджери дадуть відповідь на всі Ваші
                        запитання
                    </div>
                </div>
                <form class="grid callback-form gap-x-16 gap-y-20 md:gap-y-32 md:grid-cols-2 lg:grid-cols-3">
                    <div class=" form-item text-white  ">
                        <label for="callback-name" class="text-s mb-4"> Ім’я</label>
                        <input type="text" name="name" id="callback-name"
                               class="text-l h-[.54rem] border border-solid bg-transparent p-12 flex items-center rounded-30"
                        >
                        <div class="form-item__message"></div>
                    </div>
                    <div class="form-item text-white ">
                        <label for="callback-phone" class="text-s mb-4">
                            Номер телефона</label>
                        <input type="text" name="phone" id="callback-phone"
                               class="text-l h-[.54rem] border border-solid bg-transparent p-12 flex items-center rounded-30"
                              >
                                 <div class="form-item__message"></div>
                    </div>
                    <div class="form-item text-white">
                        <label for="callback-mail" class="text-s mb-4"> E-mail</label>
                        <input type="text" name="email" id="callback-mail"
                               class="text-l h-[.54rem] border border-solid bg-transparent p-12 flex items-center rounded-30"
                          >
                             <div class="form-item__message"></div>
                    </div>
                    <button type="submit" class="text-s lg:col-start-3  flex items-center justify-center uppercase rounded-30 h-[.54rem] px-16 py-12 text-white font-medium bg-black border-black border border-solid lg:hover:bg-transparent transition-colors lg:hover:text-black mt-auto"
                           >
                        <span>залишити заявку</span>
                    </button>
                </form>
         
    `
}

function renderAnswerModal(answer) {
    fbq('track', 'Lead');
    getElement('.modal__content .wrapper').innerHTML = `
           <div class="text-center flex flex-col items-center justify-center px-24 min-h-[4.08rem] max-w-[4.65rem] mx-auto text-white font-medium">
                    <h3 class="mb-24">
                   ${answer ? 'Ваші дані відправлено успішно!' : 'Упс...'}
                       
                    </h3>
                    <div class="text-l">${answer ? "Наші менеджери зв’яжуться з вами найближчим часом" : 'Сталася помилка, спробуйте пізніше'}</div>
                </div>

    `
}

export {renderAnswerModal}



