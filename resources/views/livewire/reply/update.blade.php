<div>
    <div x-data="{
        editReply:false,
        focus: function() {
            const textInput = this.$refs.textInput;
            textInput.focus();
            console.log('textInput')
        }
    }">
        {{ $replyOrigBody }}

        <div>
            <form wire:submit.prevent="updateReply">

                <button>
                    Save
                </button>
            </form>
    </div>
    </div>
</div>
