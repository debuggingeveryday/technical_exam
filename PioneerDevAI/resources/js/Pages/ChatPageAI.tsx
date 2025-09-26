import { Link, Head, useForm, usePage } from "@inertiajs/react";
import { FormEvent, useState } from "react";
import TextareaAutosize from "react-textarea-autosize";
import { Each } from "@/Components/Each";
import { Circles } from "react-loader-spinner";

export default function ChatPageAI({}) {
    const [answer, setAnswer] = useState<any>();

    const { data, setData, post, processing, errors } = useForm({
        prompt: "",
    });

    function submit(event: FormEvent) {
        event.preventDefault();

        post(route("ask-question"), {
            onSuccess: ({ props }) => {
                const { flash }: any = props;
                setAnswer(flash?.response);
            },
        });
    }

    return (
        <>
            <Head title="Chat Page AI" />
            <div className="h-screen w-1/2 mx-auto grid">
                <div className="grid content-center text-center justify-center">
                    <>
                        {!processing ? (
                            answer ? (
                                <p>{answer}</p>
                            ) : (
                                <p>Ask any question?</p>
                            )
                        ) : (
                            <Circles
                                height="80"
                                width="80"
                                color="#4fa94d"
                                ariaLabel="circles-loading"
                                wrapperStyle={{}}
                                wrapperClass=""
                                visible={true}
                            />
                        )}
                    </>
                </div>
                <form
                    onSubmit={submit}
                    className="flex mb-2 space-x-2 self-end"
                >
                    <TextareaAutosize
                        className="w-5/6 rounded-lg"
                        value={data.prompt}
                        onChange={(e) => setData("prompt", e.target.value)}
                    />
                    <div className="w-1/6">
                        <button
                            type="submit"
                            className="bg-blue-500 text-white p-2 px-8 rounded-lg"
                            disabled={processing}
                        >
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </>
    );
}
