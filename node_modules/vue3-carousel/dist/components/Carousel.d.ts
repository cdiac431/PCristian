declare const _default: import("vue").DefineComponent<{
    itemsToShow: {
        default: number;
        type: NumberConstructor;
    };
    currentSlide: {
        default: number;
        type: NumberConstructor;
    };
    wrapAround: {
        default: boolean;
        type: BooleanConstructor;
    };
    snapAlign: {
        default: string;
        validator(value: string): boolean;
    };
    transition: {
        default: number;
        type: NumberConstructor;
    };
    settings: {
        default(): {};
        type: ObjectConstructor;
    };
    breakpoints: {
        default: null;
        type: ObjectConstructor;
    };
}, () => import("vue").VNode<import("vue").RendererNode, import("vue").RendererElement, {
    [key: string]: any;
}>, unknown, {}, {}, import("vue").ComponentOptionsMixin, import("vue").ComponentOptionsMixin, import("vue").EmitsOptions, string, import("vue").VNodeProps & import("vue").AllowedComponentProps & import("vue").ComponentCustomProps, Readonly<{
    itemsToShow: number;
    currentSlide: number;
    wrapAround: boolean;
    snapAlign: string;
    transition: number;
    settings: Record<string, any>;
    breakpoints: Record<string, any>;
} & {}>, {
    itemsToShow: number;
    currentSlide: number;
    wrapAround: boolean;
    snapAlign: string;
    transition: number;
    settings: Record<string, any>;
    breakpoints: Record<string, any>;
}>;
export default _default;
