CREATE TRIGGER set_order_status_planning_trigger
    BEFORE INSERT ON orders
    FOR EACH ROW
EXECUTE FUNCTION set_order_status_planning();